<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){

        $tests  = Test::all();

        return view('admin.tests.index', compact('tests'));
    }
}
