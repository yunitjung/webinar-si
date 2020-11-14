<?php

namespace App\Http\Controllers\Admin;

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
            $products = json_decode(Http::withHeaders(['Authorization' => 'Bearer '.session('admin_token')])->get($this->url.'api/v1/admin/product/list')->body())->data;
            $categories = json_decode(Http::withHeaders(['Authorization' => 'Bearer '.session('admin_token')])->get($this->url.'api/v1/admin/category/list')->body())->data;

        } catch (\Throwable $th) {
            \Log::info($th);
        }

        return view('pages.admin.product.index', [
            'products' => $products ? $products : [],
            'categories' => $categories ? $categories : []
        ]);
    }
}
