<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use beatstar\pkg\Fecades\FunctionPkg;

class ValidateController extends Controller
{

    public function form(Request $request,$date)
    {

    	return Redirect::route('prueba', ['date' => FunctionPkg::current_day()])
    			->with('message',$request->color);

    }
}
