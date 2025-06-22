<?php

namespace App\Http\Controllers\B_office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('welcome');
    }
}
