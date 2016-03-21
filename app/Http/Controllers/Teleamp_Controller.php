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
    //  $result = DB::table('amp_field')->get();
      return view ('amp_install');
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
            'field_name'    => 'required',
            'customer_name' => 'required',
            'address'       => 'required',
        ]);
        if($v->fails())
        {
          return redirect()->back()->withErrors($v->errors());
        }
        else
        {
          $data = array(
            'field_name'    => $post['field_name'],
            'customer_name' => $post['customer_name'],
            'address'       => $post['address'],
          );
          $i = DB::table('amp_field')->insert($data);
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
        $logs = DB::table('data_log')->get();
        return view('amp_database', ['data'=> $result, 'groups' => $grp, 'amp'=> $amp, 'logs' => $logs]);
    }
    public function filter(Request $request){
      $user = DB::table('amp_field')->where('field_name', $request['field']);
       return view('amp_database');
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
      return view ('amp_graphical');
           //echo "You are dumb";
    }

    public function mapplan()
    {
      return view ('ampmap_plan');
           //echo "You are dumb";
    }

}
