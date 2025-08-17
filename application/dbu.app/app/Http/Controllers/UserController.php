<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $databases = $user->databases;

        // Get the latest backup for each database (limit 10)
        $backupHistory = $databases->map(function ($database) {
            return $database->backups()->latest()->first();
        })->filter()->take(10);
        // Count backups and get the latest backup date
        $maxDateBackup = null;
        $countBackups = 0;
        foreach ($databases as $database) {
            $countBackups += $database->backups()->count();
            $lastBackup = $database->backups()->latest()->first();
            if ($lastBackup && (! $maxDateBackup || $lastBackup->created_at > $maxDateBackup)) {
                $maxDateBackup = $lastBackup->created_at;
            }
        }

        $countDatabases = $databases->count();

        return view(
            'user.dashboard',
            compact('user', 'databases', 'countDatabases', 'countBackups', 'maxDateBackup', 'backupHistory')
        );
    }
}
