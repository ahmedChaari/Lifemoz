<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use Uuids ,HasFactory, SoftDeletes;
    protected $guarded = [];

    public function user(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
