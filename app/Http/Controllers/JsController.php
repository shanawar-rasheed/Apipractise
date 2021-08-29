<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jsonpractise;

class JsController extends Controller
{
    public function Jspractise()
    {
        return view('Js.index');
    }
    public function jsonCreate()
    {
        return view('js.jsonpractise');
    }
    public function jsonInsert(Request $request)
    {
      
        // exit();
        // dd($request->questioner);
        // exit();
        $data=new Jsonpractise();
        $data->questioner= json_encode( $request->input('questioner') );
        $data->save();
        if($data)
        {
            return response($data);
        }
       
    }
}
