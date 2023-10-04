<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function afficher()
    {
        return view('personne.create');
    }
}
