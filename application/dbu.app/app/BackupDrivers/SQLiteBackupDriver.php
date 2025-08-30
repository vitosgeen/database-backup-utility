<?php

namespace App\BackupDrivers;

class SQLiteBackupDriver implements \App\Contracts\BackupDriverInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function run(array $config, string $destination): bool
    {
        $command = sprintf(
            'sqlite3 %s .dump > %s',
            escapeshellarg($config['path']),
            escapeshellarg($destination)
        );
        
        exec($command, $output, $returnVar);

        return $returnVar === 0;
    }
}
