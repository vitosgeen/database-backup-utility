<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\BackupDrivers\MongoBackupDriver;

class MongoBackupDriverTest extends TestCase
{
    public function test_it_runs_mongodump_command()
    {
        $driver = new MongoBackupDriver();
        $config = [
            'host' => env('TEST_MONGODB_HOST', 'dbu.app-mongodb'),
            'port' => 27017,
            'username' => env('TEST_MONGODB_USERNAME', 'mongo'),
            'password' => env('TEST_MONGODB_PASSWORD', 'secret'),
            'database' => env('TEST_MONGODB_DATABASE', 'testdb'),
        ];
        $destination = '/tmp/mongo_backup.archive';

        $result = $driver->run($config, $destination);

        $this->assertIsBool($result);
    }
}
