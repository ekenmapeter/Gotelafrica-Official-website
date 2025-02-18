<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    
    public function show(): View
    {
        return view('community');
    }
}
