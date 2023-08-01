<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryProduct extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    protected $table  = 'inventory_product';

    public function product(): ?BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function inventory(): ?BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
