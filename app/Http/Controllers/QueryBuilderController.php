<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QueryBuilderController extends Controller
{
    public function getData()
    {


   
    	// return DB::table('devices')->get(); 


   
    	/*return DB::table('devices')
    	->where('id',4)->get();*/ 

    	/*return DB::table('devices')
    	->whereBetween('id',[3,9])->get();*/  

    	

    	/*return DB::table('devices')
    	->where('device_brand','Oppo')->get();*/




    	/*return DB::table('devices')
    	->orderBy('id')->get();*/



    	// $data=DB::table('devices')->get();
    	// return view('querybuilder.file1',compact('data'));


    	/*return DB::table('devices')
    	->insert(
    		[
    			'device_brand'=>'Nokia',
    			'device_name'=>'nokia 3310',
    			'device_id'=>'5'
    		]); */




    	/*return DB::table('devices')
    	->where('id',4)
    	->update([
    		'device_id'=>1
    	]);*/
    	


        /*return DB::table('devices')->selectRaw("id as sumresult")->groupBy('id')->get();*/


        /*return DB::table('devices')->selectRaw('count(id) as total_record, sum(id) as sum_id, max(device_id) as max_devices_id, min(device_id) as min_device_id')->get();*/

       return DB::table('resources')
       ->join('devices','resources.id','=','devices.device_id')
       ->get();
       

    }
}
