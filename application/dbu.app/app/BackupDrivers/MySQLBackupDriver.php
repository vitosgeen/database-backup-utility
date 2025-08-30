<?php

namespace App\BackupDrivers;

class MySQLBackupDriver implements \App\Contracts\BackupDriverInterface
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

        $host = $config['host'];
        $port = $config['port'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];

        $cmd = sprintf(
            'mysqldump -h%s -P%s -u%s -p"%s" %s > %s',
            escapeshellarg($host),
            escapeshellarg($port),
            escapeshellarg($username),
            $password, // wrapped in quotes, not escaped
            escapeshellarg($database),
            escapeshellarg($destination)
        );

        exec($cmd, $output, $result);

        return $result === 0;
    }
}
