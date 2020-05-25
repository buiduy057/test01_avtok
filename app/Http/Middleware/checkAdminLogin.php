<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->level == 1)
            {
                 return $next($request);
            }else{
                return redirect()->route('dangnhap');
            }
        }else{
            Auth::logout();
            return redirect()->route('dangnhap');
        }
       
    }
}
