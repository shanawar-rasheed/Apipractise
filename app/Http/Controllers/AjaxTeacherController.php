<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AjaxTeacherController extends Controller
{
    public function index()
    {
        $data=Teacher::orderBy('id','DESC')->get();
        return view('Teacher.index',compact('data'));
    }

    public function insert(Request $request)
    {
        $data=new Teacher();
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->phone=$request->phone;

        $data->save();
        // if($result)
        // {
        //     return back()->with('success','Teacher Successfully Inserted');
        // }
        // else
        // {
        //     return back()->with('fail','Unable to Insert ');
        // }
        return response()->json($data);
        // return response()->json([
            
        //     'success'=> true
        //     'message' => 'Teasher status updated successfully.'
        // ]);

    }
}
