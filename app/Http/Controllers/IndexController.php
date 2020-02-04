<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usstockdividend;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }
}
