<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use Uuids,SoftDeletes, HasFactory;

    protected $guarded = [];

    public function depot(): ?BelongsTo
    {
        return $this->belongsTo(Depot::class);
    }

    public function product(): ?BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
