<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function edit(Request $request)
    {
        return view('categories.edit');
    }

    public function create()
    {
        return view('categories.create');
    }
}
