<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        echo "Home page";
        die;
    }

    public function about()
    {
        echo "About page";
        die;
    }
}
