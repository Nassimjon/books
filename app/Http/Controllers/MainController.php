<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getMainPage() {
        return view('Main.index');
    }

    public function getWelcomePage() {
        return view('welcome');
    }

    public function addBook() {

    }
}
