<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depot extends Model
{
    use Uuids ,HasFactory, SoftDeletes;
    protected $guarded = [];

     public function products(): ?HasMany
    {
       return $this->hasMany(Product::class);
    }
}
