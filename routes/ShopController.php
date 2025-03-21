<?php

namespace App\Http\Controllers;

class ShopController extends Controller
{
    public function show($category, $page)
    {
        $viewPath = "{$category}.{$page}";
        if (view()->exists($viewPath)) {
            return view($viewPath);
        }
        abort(404);
    }
}
