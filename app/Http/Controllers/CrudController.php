<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $device=Device::all();
        return view('cruds.index',compact('device'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cruds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $this->validate([$request,
            'device_brand'=>'required',
            'device_name'=>'required',
            'device_id'=>'required',
        ]);

     $input=$request->all();
     Device::create($input);
     return redirect()->route('cruds.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Device::findOrfail($id);
        return view('cruds.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Device::find($id);
        return view('cruds.edit',compact('$data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Device::findOrfail($id);
        $this->validate([$request,
            'device_brand'=>'required',
            'device_name'=>'required',
            'device_id'=>'required',
        ]);
        $input=$request->all();
        $data->fill($input)->save();
        return redirect()->route('cruds.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Device::findOrfail($id);
        $data->delete();
        return redirect()->route('cruds.index');
    }
}
