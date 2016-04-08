<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\Middleware\ShareErrorsFromSession;



class Teleamp_Controller extends Controller
{

    public function index()
    {
      return view ('dashboard');
    }

    public function install()
    {
      $field = DB::table('amp_field')->first();

    //  $result = DB::table('amp_field')->get();
      $amp_coordinates = json_encode(
        DB::table('amplifiers')
        ->join('amp_group', 'amp_group.group_id', '=', 'amplifiers.group_id')
        ->select('amp_id', 'mac_id', 'amp_latitude', 'amp_longitude', 'name', 'color')
        ->get());
      $field_coordinates = json_encode($field);

      return view ('amp_install', ['field' => $field, 'amp_coordinates' => $amp_coordinates, 'field_coordinates' => $field_coordinates]);
    }

    public function update_amp_group(Request $request) {

      $v    = \Validator::make($request->all(),
      [
          'amp_id'        => 'required',
          'group_name'     => 'required',
          'group_color'    => 'required',
          'field_id'      => 'required'
      ]);
      if($v->fails())
      {
        return redirect()->back()->withErrors($v->errors());
      }

      // Find existing group
      $group = DB::table('amp_group')
      ->where('name', $request['group_name'])
      ->where('field_id', $request['field_id'])
      ->first();

      // If found, update it
      if ($group) {

        $data = [
          'color' => $request['group_color']
        ];

        DB::table('amp_group')
        ->where('name', $request['group_name'])
        ->where('field_id', $request['field_id'])
        ->update($data);
      }

      // Otherwise, create a new one
      else {
        $data = [
          'name' => $request['group_name'],
          'color' => $request['group_color'],
          'field_id' =>  $request['field_id']
        ];
        DB::table('amp_group')->insert($data);

        $group = DB::table('amp_group')
        ->where('name', $request['group_name'])
        ->first();
      }

      // Update amplifier
      if ($group) {

        $data = [
          'group_id' => $group->group_id
        ];
        DB::table('amplifiers')->where('amp_id', $request['amp_id'])->update($data);
      }

      return redirect()->back();
    }


  public function list_groups(Request $request)
   {
    $groups = DB::table('amp_group')->
    join('amp_field', 'amp_group.field_id', '=', 'amp_field.field_id')->
    where('amp_field.field_id', $request['field'])->lists('amp_group.name', 'amp_group.group_id');

    return response()->json($groups);
    }

    public function list_amplifiers(Request $request)
    {
      $amplifiers = DB::table('amplifiers')->
      join('amp_group', 'amplifiers.group_id', '=', 'amp_group.group_id')->
      where('amp_group.group_id', $request['field'])->lists('amplifiers.mac_id', 'amplifiers.amp_id');

      return response()->json($amplifiers);
    }


    public function save(Request $request)
    {
        $post = $request->all();
        $v    = \Validator::make($request->all(),
        [
            'field_name'        => 'required',
            'customer_name'     => 'required',
            'address'           => 'required',
            'temperature'       => 'required',
            'center_latitude'   => 'required',
            'center_longitude'  => 'required',
        ]);
        if($v->fails())
        {
          return redirect()->back()->withErrors($v->errors());
        }
        else
        {
          $data = array(
            'field_name'             => $post['field_name'],
            'customer_name'          => $post['customer_name'],
            'address'                => $post['address'],
            'temperature'            => $post['temperature'],
            'center_latitude'        => $post['center_latitude'],
            'center_longitude'       => $post['center_longitude'],
          );
          $i = 0;
          if (isset($post['field_id'])) {
            $i = DB::table('amp_field')->where('field_id', $post['field_id'])->update($data);
          }
          else {
            $i = DB::table('amp_field')->insert($data);
          }
          if($i > 0)
           {
             \Session::flash('message','Record have been added successfully');
            return redirect('amp_install');
           }
        }
     }

    public function database()
    {
        $result = DB::table('amp_field')->get();
        $grp = DB::table('amp_group')->get();
        $amp = DB::table('amplifiers')->get();
        return view('amp_database', ['data'=> $result, 'groups' => $grp, 'amp'=> $amp]);
    }

    public function limit_filter(Request $request){
      $fields = DB::table('amp_field')->get();
       // for data logs in amp graphical
      if (isset($request['amplifiers']) && $request['amplifiers'] > 0) {
        $results = DB::table('data_log')->
          where('amp_id', $request['amplifiers'])->get();
        $selection = [
          'amplifier' => DB::table('amplifiers')->where('amp_id', $request['amplifiers'])->first(),
          'group' => DB::table('amp_group')->where('group_id', $request['groups'])->first(),
          'field' => DB::table('amp_field')->where('field_id', $request['fields'])->first()
        ];
        return view($request['page'], ['logs' => $results, 'data'=> $fields, 'selection' => $selection]);
      }

      return view('amp_graphical', ['data'=>$fields]);
    }

    public function filters(Request $request){
      $fields = DB::table('amp_field')->get();
       // for data logs in amp graphical
      if (isset($request['amplifiers']) && $request['amplifiers'] > 0) {
        $results = DB::table('data_log')->
          join('amplifiers', 'amplifiers.amp_id', '=', 'data_log.amp_id')->
          where('amplifiers.amp_id', $request['amplifiers'])->get();
        return view($request['page'], ['logs' => $results, 'data'=> $fields]);
      }
      // amp graphical data log ends here
      if (isset($request['groups']) && $request['groups'] > 0) {
        $results = DB::table('data_log')->
          join('amplifiers', 'amplifiers.amp_id', '=', 'data_log.amp_id')->
          join('amp_group', 'amp_group.group_id', '=', 'amplifiers.group_id')->
          where('amp_group.group_id', $request['groups'])->get();
        return view($request['page'], ['logs' => $results, 'data'=> $fields]);
      }
      if (isset($request['fields']) && $request['fields'] > 0) {
        $results = DB::table('data_log')->
          join('amplifiers', 'amplifiers.amp_id', '=', 'data_log.amp_id')->
          join('amp_group', 'amp_group.group_id', '=', 'amplifiers.group_id')->
          join('amp_field', 'amp_field.field_id', '=', 'amp_group.field_id')->
          where('amp_field.field_id', $request['fields'])->get();
        return view($request['page'], ['logs' => $results, 'data'=> $fields]);
      }
        //join('amp_groups', 'amp_group.fied_id')->where('field_name', $request['field']);
       return view($request['page'],['data'=> $fields]);
    }


/***
  public function databasee()
            {
              $resultt = DB::table('amp_group')->get();
              return view('amp_database')->with('dataa',$resultt);

            }
*/

    public function graphical()
    {
      $fields = DB::table('amp_field')->get();
      return view ('amp_graphical', ['data'=> $fields]);
           //echo "You are here";
    }

    public function mapplan(Request $request)
    {
      $fields = DB::table('amp_field')->get();
      //  $result = DB::table('amp_field')->get();
      $query = DB::table('amplifiers')
      ->join('amp_group', 'amp_group.group_id', '=', 'amplifiers.group_id')
      ->leftJoin('data_log as d', function($q) {
        $q->on('amplifiers.amp_id', '=', 'd.amp_id')
        ->on('d.time','=',
          DB::raw('(select max(time) from data_log where amp_id = d.amp_id)')
        );
      });

      if (isset($request['field_id'])) {
        $query = $query->where('amp_group.field_id', $request['field_id']);
      }

      $query = $query->groupBy('amplifiers.amp_id')
      ->select('amplifiers.amp_id', 'amplifiers.group_id', 'color', 'name', 'amp_latitude', 'amp_longitude'
      ,'amp_volume', 'temperature', 'amp_mute', 'amp_ps')
      ->get();

      $field_selection = [
        'field' => DB::table('amp_field')->where('field_id', $request['field_id'])->first()
      ];

      $amp_coordinates = json_encode($query);
      $field_coordinates = [];

      if (isset($request['field_id']))
        $field_coordinates = json_encode(DB::table('amp_field')->where('field_id', $request['field_id'])->select('field_id', 'center_latitude', 'center_longitude')->first());

      return view ('amp_map_plan', ['field_selection' => $field_selection, 'fields' => $fields, 'amp_coordinates' => $amp_coordinates, 'field_coordinates' => $field_coordinates]);

    }

    public function edit_amp_details(Request $request)
    {
      $post = $request->all();
      $e    = \Validator::make($request->all(),
      [
          'amp_id'          => 'required',
          'amp_volume'      => 'required',
          'temperature'     => 'required',
      ]);

      if($e->fails())
      {
        return redirect()->back()->withErrors($e->errors());
      }
      else
      {
        $amp_data = array(
          'amp_ps'            => isset($post['amp_ps']) ? 1 : 0,
          'amp_mute'          => isset($post['amp_mute']) ? 1 : 0
        );

        $latest_log = DB::table('data_log')->where('amp_id',$post['amp_id'])->orderBy('time','desc')->first();

        $logs_data = array(
          'amp_id'            => $post['amp_id'],
          'amp_volume'        => $post['amp_volume'],
          'temperature'       => $post['temperature'],
          'amp_battery'       => isset($latest_log) ? $latest_log->amp_battery : 0,
          'amp_delay'         => isset($latest_log) ? $latest_log->amp_delay : 0
        );

        DB::table('amplifiers')->where('amp_id', $post['amp_id'])->update($amp_data);
        $i = DB::table('data_log')->insert($logs_data);
        if ($i <= 0) {
          return response()->json(['success' => false]);
        }
        return response()->json(['success' => true]);
      }
    }

}
