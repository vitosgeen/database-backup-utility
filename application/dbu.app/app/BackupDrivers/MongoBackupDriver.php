<?php

namespace App\BackupDrivers;

class MongoBackupDriver implements \App\Contracts\BackupDriverInterface
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
            'mongodump --host %s --port %d --username %s --password %s --db %s --out %s',
            escapeshellarg($config['host']),
            (int)$config['port'],
            escapeshellarg($config['username']),
            escapeshellarg($config['password']),
            escapeshellarg($config['database']),
            escapeshellarg($destination)
        );

        exec($command, $output, $returnVar);

        return $returnVar === 0;
    }
}
