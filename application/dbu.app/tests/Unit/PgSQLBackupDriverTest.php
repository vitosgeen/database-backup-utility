<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\BackupDrivers\PgSQLBackupDriver;

class PgSQLBackupDriverTest extends TestCase
{
    public function test_it_generates_valid_pg_dump_command()
    {
        $driver = new PgSQLBackupDriver();
        $config = [
            'host' =>  env('TEST_PGSQL_HOST', 'dbu.app-pg'),
            'port' => env('TEST_PGSQL_PORT', 5432),
            'username' => env('TEST_PGSQL_USERNAME', 'postgres'),
            'password' => env('TEST_PGSQL_PASSWORD', 'secret'),
            'database' => env('TEST_PGSQL_DATABASE', 'sample_db'),
        ];
        $destination = '/tmp/sample_db_backup.sql';

        $result = $driver->run($config, $destination);

        $this->assertIsBool($result);
    }
}
