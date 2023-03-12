<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.main.index');
    }
}
