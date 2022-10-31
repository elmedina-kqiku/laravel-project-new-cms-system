<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //

    public function index(){

            //the view admin/index.blade.php
        return view('admin.index');

    }
}
