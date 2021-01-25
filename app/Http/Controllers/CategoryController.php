<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return 'list kategori';
    }

    public function edit(Request $request)
    {
        return 'Sedang mengedit item ' . $request->id;
    }
}
