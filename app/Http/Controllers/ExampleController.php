<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function example1()
    {
        return view('example.example1');
    }

    public function example2()
    {
        return view('example.example2');
    }
}
