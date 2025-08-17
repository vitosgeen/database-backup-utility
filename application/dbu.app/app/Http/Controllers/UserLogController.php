<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class UserLogController extends Controller
{
    public function index()
    {
        $logs = UserLog::where('user_id', Auth::id())
            ->latest()
            ->limit(50)
            ->get();

        return view('user.logs.index', compact('logs'));
    }
}
