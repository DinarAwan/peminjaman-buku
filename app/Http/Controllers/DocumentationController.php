<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    function index(){
        return view ('documentation');
    }

    public function dockForGuest(){
        return view('documentation-guest');
    }
}
