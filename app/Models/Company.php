<?php

namespace App\Models;

use App\Traits\FilterByUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory, FilterByUser;
    protected $fillable = ['name', 'user_id','region'];  

    public function Purchase():HasMany
    {
        return $this->hasMany(Purchase::class, 'company_id');
    }

    public function User():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
