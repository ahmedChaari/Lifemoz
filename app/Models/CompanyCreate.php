<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyCreate extends Model
{
    use Uuids ,HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'companies';
    protected $casts   = [
      'has_activated' => 'boolean',
     ];
     public function products(): ?HasMany
     {
        return $this->hasMany(Product::class);
     }
     public function users(): ?HasMany
     {
        return $this->hasMany(User::class);
     }
     public function unities(): ?HasMany
     {
        return $this->hasMany(Unity::class);
     }
     public function services(): ?HasMany
     {
        return $this->hasMany(Service::class);
     }
     public function roles(): ?HasMany
     {
        return $this->hasMany(Role::class);
     }
     public function historics(): ?HasMany
     {
        return $this->hasMany(Historic::class);
     }
     public function categories(): ?HasMany
     {
        return $this->hasMany(Category::class);
     }
}
