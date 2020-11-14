<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->url = env('SI_GATEWAY', null);
    }

    public function index()
    {
        return view('pages.admin.login');
    }

    public function tryLogin(Request $request)
    {
        try {
            $check = json_decode(Http::post($this->url.'api/v1/admin/auth/login', $request->except('_token'))->body());

            if($check->success){
                if(!$check->data->is_active) {
                    return $this->fail('Your account was disabled, please contact our administrator');
                }

                session()->put('admin_data', json_encode($check->data));

                $createToken = json_decode(Http::post($this->url.'api/v1/admin/auth/create-token', ['id' => $check->data->id])->body());

                session()->put('admin_token', $createToken->data);
                
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->with('error', $check->message);
            }
        } catch (\Throwable $th) {
            \Log::critical($th);
            return redirect()->back()->with('error', 'There\'s something wrong, please contact our system administrator');
            //throw $th;
        }
    }
}
