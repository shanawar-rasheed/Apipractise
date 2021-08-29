<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table='teachers';
                        //Mutator//
    //This is mutator which update/change record in database inserting/putting 
    public function setEmailAttribute($value) // syntex is set{column name in capital}Attribute
    {
      $this->attributes['email']=strtoupper($value);
    }
                        //Accessor//
        //This is mutator which update/change record in database on accessing/getting 

    public function getFirstNameAttribute($value) // syntex is get{column name in capital}Attribute
    {
        return strtoupper($value);
    }
    
}

