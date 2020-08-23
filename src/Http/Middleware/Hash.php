<?php

namespace Neo\Pkg\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Redirect;

use BeatStar\Pkg\Fecades\FunctionPkg;

class Hash
{

    public function handle($request, Closure $next)
    {	

    	if (Request::isMethod('get')) 
    	{

    		if (Request::is('validate/*')) 
            {
                $request_day = FunctionPkg::decrypt($request->date);

                if ($request_day != null) {

                    $current_day = FunctionPkg::format_date();

                    $current_format = FunctionPkg::create_format($current_day);

                    $request_format = FunctionPkg::create_format($request_day);

                    $interval = $current_format->diff($request_format);

                    $validate_hours = intval($interval->format('%h'));

                    $validate_days = intval($interval->format('%a'));

                    if($validate_days == 0 && $validate_hours <= 6)
                    {
                        return Redirect::to(FunctionPkg::decrypt($request->param)."/".FunctionPkg::current_day());

                    }else
                    {
                        return Redirect::to("/");
                    }
            
                }else{

                    return Redirect::to("/");

                }

            }else if(Request::is('getter/*'))
            {
                $request_day = FunctionPkg::decrypt($request->date);

                if ($request_day != null) {

                    $current_day = FunctionPkg::format_date();

                    $current_format = FunctionPkg::create_format($current_day);

                    $request_format = FunctionPkg::create_format($request_day);

                    $interval = $current_format->diff($request_format);

                    $validate_hours = intval($interval->format('%h'));

                    $validate_days = intval($interval->format('%a'));

                    if($validate_days == 0 && $validate_hours <= 6)
                    {
                        return $next($request);

                    }else
                    {
                        return Redirect::to("/");
                    }
            
                }else{

                    return Redirect::to("/");

                }

            }

    	}else if (Request::isMethod('post')) {

            if (Request::is('setter/*')) 
            {

                $request_day = FunctionPkg::decrypt($request->date);

                if ($request_day != null) {

                    $current_day = FunctionPkg::format_date();

                    $current_format = FunctionPkg::create_format($current_day);

                    $request_format = FunctionPkg::create_format($request_day);

                    $interval = $current_format->diff($request_format);

                    $validate_hours = intval($interval->format('%h'));

                    $validate_days = intval($interval->format('%a'));

                    if($validate_days == 0 && $validate_hours <= 6)
                    {
                        return $next($request);

                    }else
                    {
                        return Redirect::to("/");
                    }
            
                }else{

                    return Redirect::to("/");

                }

            }
            
        } else if (Request::isMethod('delete')) {

            if (Request::is('setter/*')) 
            {

                $request_day = FunctionPkg::decrypt($request->date);

                if ($request_day != null) {

                    $current_day = FunctionPkg::format_date();

                    $current_format = FunctionPkg::create_format($current_day);

                    $request_format = FunctionPkg::create_format($request_day);

                    $interval = $current_format->diff($request_format);

                    $validate_hours = intval($interval->format('%h'));

                    $validate_days = intval($interval->format('%a'));

                    if($validate_days == 0 && $validate_hours <= 6)
                    {
                        return $next($request);

                    }else
                    {
                        return Redirect::to("/");
                    }
            
                }else{

                    return Redirect::to("/");

                }

            }

        } else if (Request::isMethod('put')) {

            if (Request::is('setter/*')) 
            {
                
                $request_day = FunctionPkg::decrypt($request->date);

                if ($request_day != null) {

                    $current_day = FunctionPkg::format_date();

                    $current_format = FunctionPkg::create_format($current_day);

                    $request_format = FunctionPkg::create_format($request_day);

                    $interval = $current_format->diff($request_format);

                    $validate_hours = intval($interval->format('%h'));

                    $validate_days = intval($interval->format('%a'));

                    if($validate_days == 0 && $validate_hours <= 6)
                    {
                        return $next($request);

                    }else
                    {
                        return Redirect::to("/");
                    }
            
                }else{

                    return Redirect::to("/");

                }

            }

        }
        
    }

}