<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class DeviceController extends Controller
{
    public function getDevice($id=null)
    {
    	return $id ? Device::find($id):Device::all();
    }

    public function sendData(Request $request)
    {
    	$device=new Device;
    	$device->device_brand=$request->device_brand;
    	$device->device_name=$request->device_name;
    	$device->device_id=$request->device_id;
    	$result=$device->save();
    	if($result)
    	{
    		return 
    		[
    			"name"=>"Data has been saved"
    		];
    	}
    	else
    	{
    		return 
    		[
    			"name"=>"something went wrong"
    		];
    	}
    }
    public function updateData(Request $request)
    {
    	$device=Device::find($request->id);
    	$device->device_brand=$request->device_brand;
    	$device->device_name=$request->device_name;
    	$device->device_id=$request->device_id;
    	$result=$device->save();
    	if($result)
    	{
    		return 
    		[
    			"name"=>"Data has been updated"
    		];
    	}
    	else
    		return 
    		[
    			"name"=>"something went wrong"
    		];
    }
    public function deleteData($id)
    {
    	$device=Device::find($id);
    	$result=$device->delete();
    	if($result)
    	{
    		return 
    		[
    			"name"=>"Data has been deleted"
    		];		
    	}
    	else
    	{
    		return
    		[
    			"name"=>"something went wrong"
    		];
    	}
    }
    public function searchData($name)
    {
    	return Device::where("device_name","like","%".$name."%")->get();
    }


    public function validateData(Request $request)
    {
    	$rules=array(
    		"device_brand"=>"required",
    		"device_name"=>"required",
    		"device_id"=>"required|max:4",
    	);
    	$validate=Validator::make($request->all(),$rules);
    	if($validate->fails())
    	{
    		return response()->json($validate->errors(),401);
    	}
    	else
    	{
    	$device=new Device;
    	$device->device_brand=$request->device_brand;
    	$device->device_name=$request->device_name;
    	$device->device_id=$request->device_id;
    	$result=$device->save();
    	if($result)
    	{
    		return 
    		[
    			"name"=>"Data has been saved"
    		];
    	}
    	else
    	{
    		return 
    		[
    			"name"=>"something went wrong"
    		];
    	}
    	}
    }
}
 