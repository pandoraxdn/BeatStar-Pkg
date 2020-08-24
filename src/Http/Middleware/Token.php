<?php

namespace beatstar\pkg\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

use beatstar\pkg\Fecades\FunctionPkg;

class Token
{

    public function handle($request, Closure $next)
    {	
    	
    	if (Auth::check() || Session::get('encuestado')) {

    		$token =  FunctionPkg::parse_token(Session::get('token'));

    		if ($token != null) {

    			$request_day = FunctionPkg::decrypt($token['date']);

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
        				Auth::logout();

        				Session::flush();

        				return redirect('/');
                    }

    			}else{

    				Auth::logout();

                    Session::flush();

                    return redirect('/');
    			}

    		}else{

    			Auth::logout();

                Session::flush();

                return redirect('/');

    		}

    	}else{

    		return redirect('/');

    	}
        
    }

}