<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekUserLogin
{
    public function handle(Request $request, Closure $next, $rules)
    {
        $user = Auth::user();

        if(!Auth::check()){
            return redirect('login');
        }
            if($user->level = $rules)
                return $next($request);

        return redirect('login') ->with('error', 'you have no privildge');
    }
}