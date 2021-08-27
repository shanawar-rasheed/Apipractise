<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $fillable=[
    	'name',
    	'email',
    	'phone'
    ];
    
    public static function getstudents()
    {
        $data=DB::table('students')->select('id','name','email','phone')->get()->toArray();
		return $data;
    }
}
