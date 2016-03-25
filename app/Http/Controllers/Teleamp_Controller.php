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
      $amp_coordinates = json_encode(DB::table('amplifiers')->select('amp_id', 'amp_latitude', 'amp_longitude')->get());
      $field_coordinates = json_encode($field);

      return view ('amp_install', ['field' => $field, 'amp_coordinates' => $amp_coordinates, 'field_coordinates' => $field_coordinates]);
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
        return view($request['page'], ['logs' => $results, 'data'=> $fields]);
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
      ->join('amp_group', 'amp_group.group_id', '=', 'amplifiers.group_id');

      if (isset($request['field_id'])) {
        $query = $query->where('amp_group.field_id', $request['field_id']);
      }

      $query = $query->select('amp_id', 'amplifiers.group_id', 'color', 'name', 'amp_latitude', 'amp_longitude')
      ->get();

      $amp_coordinates = json_encode($query);
      $field_coordinates = [];
      if (isset($request['field_id']))
        $field_coordinates = json_encode(DB::table('amp_field')->where('field_id', $request['field_id'])->select('field_id', 'center_latitude', 'center_longitude')->first());

      return view ('ampmap_plan', ['fields' => $fields, 'amp_coordinates' => $amp_coordinates, 'field_coordinates' => $field_coordinates]);

    }

}
