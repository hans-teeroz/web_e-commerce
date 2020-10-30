<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::where([
            'c_active' => Category::STATUS_PUBLIC
        ])->get();
        $system = System::where([
            'id' => 1
        ])->first();
        View::share('categories',$categories);
        View::share('system',$system);
    }
}
