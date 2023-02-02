<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Uuids, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 //  protected $fillable = [
    //   'name', 'email', 'password',
  //  ];

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(): ?HasMany
    {
       return $this->hasMany(Product::class);
    }

    public function historics(): ?HasMany
    {
       return $this->hasMany(Historic::class);
    }

    public function role(): ?BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function service(): ?BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function company(): ?BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
