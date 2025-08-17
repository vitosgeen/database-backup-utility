<?php

namespace App\Console\Commands;

use App\Models\Backup;
use App\Models\Database;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RunDatabaseBackup extends Command
{
    protected $signature = 'backup:run {database_id}';

    protected $description = 'Run a backup for the specified user database';

    const MAX_BACKUPS = 3;

    public function handle()
    {
        $maxBackups = config('backup.max_backups', self::MAX_BACKUPS);
        $databaseId = $this->argument('database_id');
        $database = Database::find($databaseId);

        if (! $database) {
            $this->error('Database not found.');

            return 1;
        }

        $userId = $database->user_id;
        $filename = 'backup_'.now()->format('Ymd_His').'.sql';
        $path = "backups/{$userId}/{$database->id}/{$filename}";

        // Simulated backup content
        $backupContent = "-- Backup of {$database->database_name} ({$database->type})\n-- Host: {$database->host}:{$database->port}";

        Storage::put($path, $backupContent);
        $size = Storage::size($path);

        Backup::create([
            'database_id' => $database->id,
            'filename' => $filename,
            'size' => $size,
            'type' => 'full',
        ]);

        // Enforce max backup limit
        $backups = $database->backups()->latest()->get();
        if ($backups->count() > self::MAX_BACKUPS) {
            $toDelete = $backups->slice(self::MAX_BACKUPS);
            foreach ($toDelete as $old) {
                Storage::delete("backups/{$userId}/{$database->id}/{$old->filename}");
                $old->delete();
            }
        }

        $this->info("Backup created: {$filename}");

        return 0;
    }
}
