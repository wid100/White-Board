<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $today = Carbon::today();
        $newUsersCount = User::whereDate('created_at', $today)->count();
        $user = User::all()->count();
        return view('dashboard', compact('user', 'newUsersCount'));
    }
}
