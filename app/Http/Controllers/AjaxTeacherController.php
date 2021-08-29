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

        
        // $collect = []; // empty array for collect customised inputs
        // foreach($request->all() as $input_key => $input_value){ // split input one by one
        //  $collect[] = array( //customised inputs
        //     "id" => $input_key,
        //     "value" => $input_value
        //  );
        // } 
        // $result = json_encode($collect); //convert to json
        // return response($result);

    }

    public function getTeacherById($id)
    {
        $teacher=Teacher::find($id);
        return response()->json($teacher);
    }
    public function updateTeacher(Request $request)
    {
        $teacher=Teacher::find($request->id);
        $teacher->firstname=$request->firstname;
        $teacher->lastname=$request->lastname;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        $teacher->save();
        return response()->json($teacher);

    }
    public function deleteTeacher($id)
    {
        $teacher=Teacher::find($id);
        $teacher->delete();
        return response()->json(['success'=>'Record Has Been Deleted']);
    }
}
