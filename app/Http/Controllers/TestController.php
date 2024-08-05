<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestController extends Controller
{
    public function getAdminPage(): View{

        return view('Admin.index');
    }
}
