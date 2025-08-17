<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $fillable = [
        'user_id', 'name', 'type', 'host', 'port',
        'username', 'password', 'database_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function backups()
    {
        return $this->hasMany(\App\Models\Backup::class);
    }
}
