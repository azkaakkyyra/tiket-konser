<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function pengunjung()
    {
        $user = Auth::user();

        $ticket = Ticket::where('user_id', $user->id)->first();

        return view('auth.pengunjung', compact('user', 'ticket'));
    }
}
