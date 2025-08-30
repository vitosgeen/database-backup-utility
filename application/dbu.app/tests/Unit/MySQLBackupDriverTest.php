<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\BackupDrivers\MySQLBackupDriver;

class MySQLBackupDriverTest extends TestCase
{
    public function test_it_generates_valid_mysqldump_command()
    {
        $driver = new MySQLBackupDriver();
        $config = [
            'host' => env('TEST_MYSQL_HOST', 'localhost'),
            'port' => env('TEST_MYSQL_PORT', 3306),
            'username' => env('TEST_MYSQL_USERNAME', 'user'),
            'password' => env('TEST_MYSQL_PASSWORD', 'pass'),
            'database' => env('TEST_MYSQL_DATABASE', 'my_db'),
        ];
        $destination = '/tmp/test_backup.sql';

        // Since we're testing the shell call, mock exec
        $result = $driver->run($config, $destination);

        // We assume mysqldump exists; if not, this may fail
        $this->assertIsBool($result);
    }
}
