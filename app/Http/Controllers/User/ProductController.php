<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->url = env('SI_GATEWAY', null);
    }

    public function index()
    {
        try {
            $products = json_decode(Http::get($this->url.'api/v1/user/product/list')->body())->data;
        } catch (\Throwable $th) {
            \Log::info($th);
            $products = [];
        }

        return view('pages.user.product', compact('products'));
    }
}
