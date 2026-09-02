<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaffleTicket;

class HomeController extends Controller
{
    public function index()
    {
        $tickets = RaffleTicket::orderBy('number')->get();
        return view('home', compact('tickets'));
    }
}
