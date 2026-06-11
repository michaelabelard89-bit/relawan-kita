<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalEvents        = Event::count();
        $totalRegistrations = Registration::count();
        $totalUsers         = User::where('role', 'user')->count();
        $recentEvents       = Event::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalRegistrations',
            'totalUsers',
            'recentEvents'
        ));
    }
}