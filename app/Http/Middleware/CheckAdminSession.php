<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckAdminSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('admin_token')){
            $header = ['Authorization' => 'Bearer '.session()->get('admin_token')];

            try {
                $check_session = json_decode(Http::withHeaders($header)->get(env('SI_GATEWAY').'api/v1/admin/auth/check-session')->body());
                if($check_session->success){
                    return $next($request);
                }else {
                    return redirect()->route('admin.auth.login');
                }
            } catch (\Throwable $th) {
                \Log::warning($th);
                redirect()->route('admin.auth.login');
            }
        } else  return redirect()->route('admin.auth.login');
    }
}
