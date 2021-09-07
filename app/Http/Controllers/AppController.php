<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome()
    {
        // $meals = Meal::all();
        // $meals = Meal::inRandomOrder()->limit(9)->get();
        $meals = Meal::paginate(9);
        return view('welcome', compact('meals'));
    }

    public function about()
    {
        return view('about', ['message' => 'This is the about page ...']);
    }
}
