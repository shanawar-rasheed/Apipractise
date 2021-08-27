<?php

namespace App\Http\Controllers;
//use App\Models\Image;
use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function allImage()
    {
        $data=Image::all();
        return view("Images.allImages",compact('data'));
    }

    public function addImage()
    {
        return view('Images.addimage');
    }

    public function storeImage(Request $request)
    {
        $name=$request->name;
        $image=$request->file('file');
        $imagename=time().'.'.$image->extension();
        $image->move(public_path('Images'),$imagename);

        $data=new Image();
        $data->name=$name;
        $data->profileimage=$imagename;
        $data->save();
        return back()->with('success',"Profile Image Successfully Inserted");
    }

    public function showImage($id)
    {
        $data=Image::find($id);
        return view("Images.showimage",compact('data'));
    }
    public function editImage($id)
    {
        
        $data=Image::find($id);
        return view("Images.editimage",compact('data'));
    }

    public function updateImage(Request $request)
    {
        $name=$request->name;
        $image=$request->file('file');
        $imagename=time().'.'.$image->extension();
        $image->move(public_path('images'),$imagename);

        $data=Image::find($request->id);
        $data->name=$name;
        $data->profileimage=$imagename;
        $data->save();
        return back()->with('success','Profile Image Updated Successfully');

    }
    public function deleteImage(Request $request)
    {
        $data=Image::find($request->id);
        unlink(public_path('images').'/'.$data->profileimage);
        $data->delete();
        return back()->with('success','profile image Successfully deleted');
    }
    

    public function resizeImage()
    {
        return view('Images.resize');
    }

    public function resizeImageSubmit(Request $request)
    {
        $image=$request->file;
        $filename=$image->getClientOriginalName();
        $image_resize=Image::make($image->getRealPath());
        $image_resize->resize(300,300);
        $image_resize->save(public_path('images/'.$filename));

        return back()->with('success','Image Resize Successsfully');
    }

    public function lazyImage()
    {
        return view("Images.lazy");
    }
}
