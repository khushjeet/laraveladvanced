<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        $user = User::findOrFail($request->user_id);
        if($user->role === 'admin'){
            dd('admin');
        } else {
            dd($user);
            return response()->json(['error' => 'Unauthorized'], 403);
        }


    }
}
