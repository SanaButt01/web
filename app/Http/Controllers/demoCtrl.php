<?php

namespace App\Http\Controllers;

class demoCtrl extends Controller{
public function index()
{
    return view('ctrl');
}

public function home()
{
    return view('layout.first');
}
}