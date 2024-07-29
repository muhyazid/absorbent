<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductFrontendController extends Controller
{
    //
    public function index(){
        return view('backend.Products.index');
    }
}
