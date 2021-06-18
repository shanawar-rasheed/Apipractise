<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class dummpApi extends Controller
{
    public function getData()
    {
    	return
    	[
    		"name"=>"shanawar",
    		"mobile"=>"infinix",
    		"email"=>"shanawarrasheed500@gmail.com"
    	];
    }
}
