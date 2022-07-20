<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Basicauth as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Basicauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::check()) {
        //     return $next($request);
        // }

         if (!Auth::check()) {
            // return $next($request);
            return redirect('signin')->with('fail','please login first');
        }

        

        foreach (Auth::user()->roles as $userdata) {
          $role = $userdata->role_name;
          

         
        }

        if (Auth::check()) {
            if ($role == 'Admin') {
               return $next($request);
            }
            if ($role == 'writer') {
               return $next($request);
            }
            else{
                return redirect('/');
            }

        }

      


        // return redirect('signin')->with('fail','please login first');
        
    }
}
