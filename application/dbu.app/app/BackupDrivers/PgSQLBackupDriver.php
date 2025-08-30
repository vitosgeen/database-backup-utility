<?php

namespace App\BackupDrivers;

class PgSQLBackupDriver implements \App\Contracts\BackupDriverInterface
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
            'PGPASSWORD=%s pg_dump -h %s -p %d -U %s %s > %s',
            escapeshellarg($config['password']),
            escapeshellarg($config['host']),
            (int)$config['port'],
            escapeshellarg($config['username']),
            escapeshellarg($config['database']),
            escapeshellarg($destination)
        );

        exec($command, $output, $returnVar);

        return $returnVar === 0;
    }
}
