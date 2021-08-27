<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Providers\Paginator;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Excel;
use Validate;
use PDF;


class StudentController extends Controller
{
    public function index()
    {
    	/*$data=DB::table('students')->orderBy('id','Asc')->get();*/


    	/*$data=DB::table('students')->where('id',3)->orwhere('name','shanawar')->get();*/


    	// $data=DB::table('students')->whereBetween('id',[3,4])->get();


    	/*$data=DB::table('students')
    	->whereIn('id',[1,3,5])
    	->whereNotBetween('id',[1,3])
    	->get();*/

    	/*$data=DB::table('students')->where('name','Ayesha')
    	->orwhere('name','Rizwan')
    	->get();*/

    	/*$data=DB::table('students')->whereIn('name',['Rizwan','Ayesha','Shanawar'])->get();*/

    	/*$variable='Shanawar';
    	$data=DB::table('students')
    	->where('name',$variable)
    	->orwhere(function($query){
    		$query->where('id',[3])
    			  ->where('name','jibran');
    	})
    	->get();*/



    	/*$data=DB::table('students')->whereDate('created_at','2021-05-02')->get();*/

    	/*$data=DB::table('students')->whereDay('created_at','3')->get();*/

    	/*$data=DB::table('students')->whereMonth('created_at','5')->get();*/

    	/*$data=DB::table('students')->whereYear('created_at','2021')->get();*/

    	/*$data=DB::table('students')
    	->whereday('created_at','18')
    	->whereMonth('created_at','11')
    	->whereYear('created_at','2020')
    	->whereTime('created_at','20:09:10')
    	->get();*/

    	/*$data=DB::table('students')->whereColumn('created_at','updated_at')->get();*/


    	/*$data=DB::table('students')->orderBy('id','Desc')->first();*/


    	/*$data=DB::table('students')
    	->orderBy('id','Desc')
    	->skip(1)
    	->take(1)
    	->get();*/


    	/*$data=DB::table('students')
    	->where('id',2)
    	->value('email');
    	print_r($data);
    	exit(); */            //show id 2 email


    	/*$test=DB::table('students')
    	->pluck('email','name'); //name is taken as array key
    	print_r($test);
    	exit();   */        //show all emails of email column


/*
    	$test=DB::table('students')->select('id','name','created_at');
    	$result=$test->addselect('email')->get();
    	print_r($result);
    	exit();*/




    	/*$data=DB::table('students')->find(3);*/

    	/*$data=DB::table('students')->select('id','name','email','phone')->groupBy('id','name','email','phone')->get();*/  //groupBy remove repeated values show one time


    	/*$data=DB::table('students')->offset(2)->limit(4)->get();*/     //offset skip column and limit show how many column we want to show after offset

       /* $union_variable=DB::table('students')->where('id',8);
        $data=DB::table('students')->where('id',5)->union($union_variable)->get();*/

        /*$data=DB::table('students')->max('id');
        print_r($data);
        exit();
*/

       /* $data=DB::table('students')->where('id','>','5')->count();
        print_r($data);
        exit();*/


/*
        if(DB::table('students')->where('name','shanawar')->exists())
        {
            echo("Record Exist");
        }
        else
        {
            echo("Record Does Not Exist");
        }

*/
        /*$data=DB::table('students')->where('id',14)->doesntExist();
        print_r($data);
        exit();*/

        /*$chunk_variable=DB::table('students')->orderBy('id')->chunk(3,function($variable){
            foreach ($variable as $var)
            {
               echo $var->name;
               echo $var->phone;
               echo "<br>";
            }
            echo"<br>";
        });*/        //used to get large data quickly then get(),orderBy must used,


        /*$data=DB::table('students')->paginate(3);*/

        /*$data=DB::table('students')->simplepaginate(3);*/

        /*$data=DB::table('students')
        ->join('devices','students.id','=','devices.device_id')
        ->get();
        print_r($data);
        exit();*/

        /*$data=DB::table('students')
        ->leftjoin('devices','students.id','=','devices.device_id')
        ->get();
        print_r($data);
        exit();*/      //left table is students(1sttable) right table is devices(2nd table)


        /*$data=DB::table('students')
        ->rightjoin('devices','students.id','=','devices.device_id')
        ->get();
        print_r($data);
        exit();*/

        /*$data=DB::table('students')
        ->crossjoin('devices')
        ->get();
        print_r($data);
        exit();*/

       /* $data=DB::table('students')
        ->join('devices','students.id','=','devices.device_id')
        ->where('students.id',4)
        ->select('students.*','devices.device_brand')
        ->get();
        print_r($data);
        exit();*/

        $data=DB::table('students')->paginate(5);

		
    	return view('student.index',compact('data'));
    }


    public function Create()
    {
    	return view('student.create');
    }

    public function Store(Request $request)
    {
    	$request->validate([
    		'name'=>'required',
    		'email'=>'required',
    		'phone'=>'required'
    	]);
    	$data=array(
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'phone'=>$request->phone,
    	);

    	$result=DB::table('students')->insert($data);
    	return back()->with('success','Record has been Successfully Inserted');
    }

    public function show($id)
    {

    	$data=DB::table('students')->find($id);
    	return view('student.show',compact('data'));
    	//dd($data);
    }
    public function edit($id)
    {
    	$data=DB::table('students')->find($id);
    	return view('student.edit',compact('data'));
    }
    public function updates(Request $request,$id)
    {

    	$data=array(
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'phone'=>$request->phone,
    	);
    	$result=DB::table('students')->where('id',$id)->update($data);

    	return redirect('student');
    }
    public function destroy($id)
    {
    	$data=DB::table('students')->where('id',$id);
    	$data->delete();
    	return redirect('student');
    }




					//Package are imported for excel,csv and pdf check config/app
					
	public function exportIntoExcel()    //function for exporting data in excel
	{
		return Excel::download(new StudentsExport,'Studentslist.xlsx');
	}

	public function exportIntoCsv()		//function for exporting data in csv	
	{
		return Excel::download(new StudentsExport,'Studentslist.csv');
	}

	public function exportIntoPdf()		//function for download pdf
	{
		$data=Student::all();
		$pdf=PDF::loadView('student.index',compact('data'));
		return $pdf->download('Studentslist.pdf');
	}

	public function importForm()
	{
		return view('student.import-form');
	}
	public function import(Request $request)
	{
		Excel::import(new StudentsImport,$request->file);
		return back()->with('success','Data Successfully Imported');
	}

	public function autocompleteSearch(Request $request)
	{
		$data=Student::select("name")
						->where("name","LIKE","%{$request->searches}%")
						->get();
		return response()->json($data);
	}

}
