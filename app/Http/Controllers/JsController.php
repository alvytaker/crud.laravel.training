<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsController extends Controller
{
    //
    public function binding()
    {
        return view('frontend.js_binding');
    }
}
