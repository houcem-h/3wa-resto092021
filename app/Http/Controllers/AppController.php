<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AppController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        return view('welcome', ['categories' => $categories]);
    }

    public function about()
    {
        return view('about', ['message' => 'This is the about page ...']);
    }
}
