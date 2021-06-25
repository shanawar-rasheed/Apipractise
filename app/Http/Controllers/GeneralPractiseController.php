<?php

namespace App\Http\Controllers;
use App\Mail\TestEmail;
use App\Notifications\TestNotification;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;






class GeneralPractiseController extends Controller
{
    public function FluentStrings()
    {
        //$slice= Str::of('This string is shown before: ')->after('shown');//show string data after shown keyword

        // $slice=Str::of('first slast\second slash\This is afterlast function ')->afterlast('\\');

        //$slice=Str::of("This is append function:")->append(' This is shown after using append');

        //$slice=Str::of("CONVERT TO LOWER CASE")->lower()->replace("case","Replaced string");

        //$slice=Str::of("This is a title function which convert every first letter of word into capital letter")->title();

        //$slice=Str::of("this is a slug method which return url friendly string")->slug("/");

        //$slice=Str::of("this is a substr function which will return length from which we start string second parameter is for to show how much length shown after substr")->substr(10,115);

        //$slice=Str::of("This is trim function which will trim or cut the string /")->trim('/')->upper();

        $slice=Str::of("This is all fluent string function")->after('all')->upper()->append(' appended function')->slug("/")->substr(2,100);
        return view('General.index', compact('slice'));
    }

    public function allSessionData(Request $request)
    {
        //$data=auth()->user()->select('id','name','created_at')->get();

        echo ($request->session()->regenerate());// This will regenerate id

        // $data=auth()->user()->name;
        // echo $data;

       // echo $request->session()->all();

    }

    public function getSessionData(Request $request)
    {

        if($request->session()->has('name'))
        //if($request->session()->exists('Ali'))
        {
            echo $request->session()->get('name');
        }
        else
        {
            echo"No data in Session";
        }
    }
    public function insertSessionData(Request $request)
    {

        $request->session()->put('name','Ali');
        //$request->session()->push('name','kamran');
        if($request==true)
        {
            echo "Session Data successfully inserted ";
        }
        else
        {
            echo"Unable to insert data in Session";
        }

    }

    public function deleteSessionData(Request $request)
    {
        $request->session()->forget('name');
        if($request==true)
        {
            echo "Session Data successfully Deleted from session ";
        }
        else
        {
            echo "Unable to delete data from session ";
        }

    }

    public function createFile()
    {
        return view('General.createfile');
    }
    public function storeFile(Request $request)
    {
        $request->file->store('public');
        if($request==true)
        {
            return back()->with('success','file Successfully Uploaded');
        }
        else
        {
            return back()->with('fail','Unable to upload file');
        }
    }


    public function sendEmails()
    {
        $details=[
            'title'=>'This is a Testing Email',
            'body'=>'This is a body of Mail'
        ];
        Mail::to("shanawarrasheed500@gmail.com")->send(new TestEmail($details));
        return "Email send Successfully";
    }

    public function sendNotification()
    {
        $user=User::first();
        $data=[
            'body'=>'This is a body of notification',
            'button'=>'This is  a click me buttton ',
            'url'=>url('/'),
            'thankyou'=>'Thanks For Being Part of This Notification',
        ];
        // $user->notify(new TestNotification($data));              //Sending Notification via Notificable trait
        // return "Notification send Successfully Via Notification trait";

        Notification::send($user,new TestNotification($data));      //Sending Notification via Notification facade  
        return "Notification Send Successfullt Via Notification Facades";
    }

    public function dropzone()
    {
        return view('General.dropzone');
    }
   public function dropzonestore(Request $request)
   {
        
       $image=$request->file('file');
       $imagename=time().'.'.$image->extension();
       $image->move(public_path('images'),$imagename);
       return response()->json(['success'=>$imagename]);
   }
}
