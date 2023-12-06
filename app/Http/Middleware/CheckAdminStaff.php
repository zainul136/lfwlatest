<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $isAdmin = DB::table('staff_members')->where('user_id', $user->id)->exists();
            if ($isAdmin) {
                return $next($request);
            }
        }

        return redirect()->route('home'); // Redirect to home if not an admin
    }

}
