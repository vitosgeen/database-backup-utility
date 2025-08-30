<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Backup extends Model
{
    const TYPE_FULL = 'full';

    const TYPE_INCREMENTAL = 'incremental';

    const STATUS_PENDING = 'pending';

    const STATUS_IN_PROGRESS = 'in_progress';

    const STATUS_COMPLETED = 'completed';

    const STATUS_FAILED = 'failed';

    protected $fillable = [
        'database_id',
        'filename',
        'size',
        'type',
        'status',
    ];

    public function database(): BelongsTo
    {
        return $this->belongsTo(Database::class);
    }
}
