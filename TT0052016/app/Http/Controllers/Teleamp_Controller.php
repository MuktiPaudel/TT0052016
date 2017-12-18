<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\Middleware\ShareErrorsFromSession;

use App\Field;
use App\Amplifier;
use App\Group;
use App\DataLog;

class Teleamp_Controller extends Controller
{
   // main page of the website
    public function index()
    {
      return view ('dashboard');
    }

   // Amplifiers installation is handled with this function "install".
    public function install()
    {
      $field = Field::first();
      $amp_coordinates = json_encode(
        Amplifier::with('group')->get()
      );
      $field_coordinates = json_encode($field);

      return view ('amp_install', ['field' => $field, 'amp_coordinates' => $amp_coordinates, 'field_coordinates' => $field_coordinates]);
    }
    // Form validation
    public function update_amp_group(Request $request) {

      $v    = \Validator::make($request->all(),
      [
          'amp_id'        => 'required',
          'group_name'    => 'required',
          'group_color'   => 'required',
          'field_id'      => 'required'
      ]);
      if($v->fails())
      {
        return redirect()->back()->withErrors($v->errors());
      }

      // Find existing group
      $group = Group::where('name', $request['group_name'])
      ->where('field_id', $request['field_id'])
      ->first();

      // If found, update it
      if ($group) {
        $group->color = $request['group_color'];
        $group->save();

      }

      // Otherwise, create a new one
      else {
        $data = [
          'name'        => $request['group_name'],
          'color'       => $request['group_color'],
          'field_id'    =>  $request['field_id']
        ];
        $group = new Group($data);
        $group->save();
      }

      // Update amplifier, does not add new iteam.
      if ($group) {

        $amplifier = Amplifier::find($request['amp_id']);
        if ($amplifier) {
          $amplifier->group_id = $group->group_id;
          $amplifier->save();
        }
      }

      return redirect()->back();
    }

    // Fetches the groups from the selected Fields, it works for all the filters we use.
  public function list_groups(Request $request)
   {
    $groups = Group::where('field_id', $request['field'])->lists('name', 'group_id');
    return response()->json($groups);
    }
  // Fetches the amplifiers from the selected Group,  it works for all the filters we use.
    public function list_amplifiers(Request $request)
    {
      $amplifiers = Amplifier::where('group_id', $request['group'])->lists('mac_id', 'amp_id');
      return response()->json($amplifiers);
    }

    // Saving form input data on "amp_install" page.
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
            $i = Field::find($post['field_id'])->update($data);
          }
          else {
            $field = new Field($data);
            $i = $field->save();
          }
          if($i > 0)
           {
             \Session::flash('message','Record have been added successfully');
            return redirect('amp_install');
           }
        }
     }

     // amp_database page is handled with this function "database".
    public function database()
    {
        $result = Field::all();
        $grp = Group::all();
        $amp = Amplifier::all();
        return view('amp_database', ['data'=> $result, 'groups' => $grp, 'amp'=> $amp]);
    }

   // Dropdown filters to filter the data on "amp_graphical" page.
    public function limit_filter(Request $request){
      $fields = Field::all();
      if (isset($request['amplifiers']) && $request['amplifiers'] > 0) {
        $results = DataLog::where('amp_id', $request['amplifiers'])->get();
        /* prints the name of the field, group and amplifier at the top of graphs according to the selection */
        $selection = [
          'amplifier' => Amplifier::where('amp_id', $request['amplifiers'])->first(),
          'group' => Group::where('group_id', $request['groups'])->first(),
          'field' => Field::where('field_id', $request['fields'])->first()
        ];
        return view($request['page'], ['logs' => $results, 'data'=> $fields, 'selection' => $selection]);
      }

      return view('amp_graphical', ['data'=>$fields]);
    }

  // Data logs to display on chart of the selected amplifier is handled in this function for page "amp_graphical".
    public function graphical()
      {
          $fields = Field::all();
          return view ('amp_graphical', ['data'=> $fields]);
      }


    // Dropdown filters to filter the data on "amp_database" page.
    public function filters(Request $request){
      $fields = Field::all();
      // If the amplifier is selected it will display all the data logs of that particular amplifier.
      if (isset($request['amplifiers']) && $request['amplifiers'] > 0) {
        $results = DataLog::where('amp_id', $request['amplifiers'])->get();
        return view($request['page'], ['logs' => $results, 'data'=> $fields]);
      }
      /*
    // If the group is selected it will display all the data logs of amplifiers on that group.
      if (isset($request['groups']) && $request['groups'] > 0) {
        $results = DataLog::whereHas('amplifier', function($q) use ($request) {
          $q->where('group_id', $request['groups']);
        })->get();
        return view($request['page'], ['logs' => $results, 'data'=> $fields]);
      }
      // If the field is selected it will display all the data logs of amplifiers on that field.
      if (isset($request['fields']) && $request['fields'] > 0) {
        $results = DataLog::whereHas('amplifier', function($q) use ($request) {
          $q->whereHas('group', function($q) use ($request) {
            $q->where('field_id', $request['fields']);
          });
        })->get();
        return view($request['page'], ['logs' => $results, 'data'=> $fields]);
      }
      */
      // If no fields are selected it will display the list of field on that whole system.
       return view($request['page'],['data'=> $fields]);
    }

   // Amplifiers positioning display for the selected fields is handled with this function "mapplan" on page "amp_map_plan".
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
      ->select('amplifiers.amp_id', 'mac_id', 'amplifiers.group_id', 'color', 'name', 'amp_latitude', 'amp_longitude'
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

 // amplifiers parameters can be edited or changed with this function, if some data/status are already available there, they are shown and allow user to change them.
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

        $latest_log = DataLog::where('amp_id',$post['amp_id'])->orderBy('time','desc')->first();

        $logs_data = array(
          'amp_id'            => $post['amp_id'],
          'amp_volume'        => $post['amp_volume'],
          'temperature'       => $post['temperature'],
          'amp_battery'       => isset($latest_log) ? $latest_log->amp_battery : 0,
          'amp_delay'         => isset($latest_log) ? $latest_log->amp_delay : 0
        );

        Amplifier::find($post['amp_id'])->update($amp_data);
        $data_log = new DataLog($logs_data);
        if ($data_log->save()) {
          return response()->json(['success' => false]);
        }
        return response()->json(['success' => true]);
      }
    }

}
