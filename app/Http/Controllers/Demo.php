<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Routing\Controller;

class Demo extends Controller
{

  public function index()
      {
          $something = DB::table('amp_field')->get();
          $counter = 0;
          $array =array();
          $add =array();
          foreach($something as $some){

          $array[$counter]  = $some->field_name;
          $add[$counter]  = $some->address;
              $counter++;
      }
          return view('demo',['data' => $array, 'add' => $add]);

      }

}
