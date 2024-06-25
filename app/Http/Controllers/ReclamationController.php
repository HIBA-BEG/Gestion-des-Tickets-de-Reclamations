<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;

class ReclamationController extends Controller
{
    public function create(): View
    {
        return view("addForm");
    } 
    public function info(): View
    {
        return view("infoForm");
    } 
   
}
