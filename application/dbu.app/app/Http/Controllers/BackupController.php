<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {

        $databases = Auth::user()->databases()->with(['backups' => function ($query) {
            $query->latest();
        }])->get();

        return view('user.backups.index', compact('databases'));
    }

    public function download($id)
    {
        $backup = Backup::find($id);
        if (! $backup) {
            return redirect()->route('backups.index')->with('error', 'Backup not found.');
        }

        // Who is the owner of the backup? get from db
        $database = $backup->database;
        $user = $database->user;

        // get the backup file from private storage (private/backups/{user_id}/{database_id}/{filename})
        if (! Storage::exists("backups/{$user->id}/{$database->id}/{$backup->filename}")) {
            return redirect()->route('backups.index')->with('error', 'Backup file not found.');
        }

        return Storage::download("backups/{$user->id}/{$database->id}/{$backup->filename}");
    }

    public function destroy($id)
    {
        $backup = Backup::find($id);
        if (! $backup) {
            return redirect()->route('backups.index')->with('error', 'Backup not found.');
        }

        // Who is the owner of the backup? get from db
        $database = $backup->database;
        $user = $database->user;

        // delete the backup file from storage
        Storage::delete("backups/{$user->id}/{$database->id}/{$backup->filename}");

        // delete the backup record from db
        $backup->delete();

        return redirect()->route('backups.index')->with('status', 'Backup deleted successfully.');
    }

    public function run($id)
    {
        $database = Auth::user()->databases()->find($id);
        if (! $database) {
            return redirect()->route('backups.index')->with('error', 'Database not found.');
        }

        // Validate the database ID
        if (! $database->exists()) {
            return redirect()->route('backups.index')->with('error', 'Invalid database ID.');
        }

        // Dispatch the backup command
        Artisan::call('backup:run', ['database_id' => $database->id]);

        return redirect()->route('backups.index')->with('status', 'Backup started!');
    }
}
