<?php

namespace App\Listeners;

use App\Models\UserLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class LogUserLogin
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Login $event): void
    {
        UserLog::create([
            'user_id' => $event->user->id,
            'action' => 'login',
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
        ]);
    }
}
