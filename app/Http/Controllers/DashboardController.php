<?php

namespace App\Http\Controllers;

use App\Mail\Postliked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {

        return view("dashboard");
    }
}
