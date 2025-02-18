<?php

namespace App\Http\Controllers;
use App\Models\Referral;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    public function show(): View
    {
        $teamSize = Referral::where("user_id", auth()->user()->id)->count('user_from');

        $validTeam = DB::table('referral')
        ->join('product_transaction', 'referral.user_from', '=', 'product_transaction.user_id')
        ->where('product_transaction.status', 1)
        ->where('referral.user_id', Auth::user()->id)
        ->distinct()
        ->count('user_from');

        $invitation = Referral::where("user_id", auth()->user()->id)->count();


        // $a_downlione fetches users who registered using a specific user_id invite code
        $a_downlione = Referral::where("user_id", auth()->user()->id)->paginate(10);
        // $b_downlione fetches user_from values from $a_downlione, finding users who used the invite code of users found in $a_downlione
        $b_downlione = Referral::whereIn("user_id", $a_downlione->pluck('user_from'))->paginate(10);
        // $c_downlione fetches user_from values from $b_downlione, aiming to list users who used the invite code of users found in $b_downlione
        $c_downlione = Referral::whereIn("user_id", $b_downlione->pluck('user_from'))->paginate(10);
        $d_downlione = Referral::whereIn("user_id", $c_downlione->pluck('user_from'))->paginate(10);



        return view('team', compact('teamSize','validTeam','invitation','a_downlione','b_downlione','c_downlione','d_downlione'));
    }
}
