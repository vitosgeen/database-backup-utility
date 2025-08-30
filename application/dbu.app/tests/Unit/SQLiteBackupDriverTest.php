<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\BackupDrivers\SQLiteBackupDriver;

class SQLiteBackupDriverTest extends TestCase
{
    public function test_it_copies_sqlite_file()
    {
        $driver = new SQLiteBackupDriver();
        $config = [
            'path' => '/tmp/testdb.sqlite'
        ];
        $destination = '/tmp/testdb_backup.sqlite';

        // Create dummy db file
        file_put_contents($config['path'], '');

        $result = $driver->run($config, $destination);

        $this->assertTrue(file_exists($destination));
        $this->assertTrue($result);
    }
}
