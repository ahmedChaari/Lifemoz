<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use Uuids ,HasFactory, SoftDeletes;
    protected $guarded = [];

    public function user(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): ?BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function unity(): ?BelongsTo
    {
        return $this->belongsTo(Unity::class);
    }

    public function depot(): ?BelongsTo
    {
        return $this->belongsTo(Depot::class);
    }

}
