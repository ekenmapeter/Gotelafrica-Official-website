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

    public function contest(): View
    {
        return view('gotelafrica_creative_contest');
    }

    public function apply(): View
    {
        return view('apply');
    }
}
