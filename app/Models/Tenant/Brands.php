<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    public function brands()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    // public function episodes()
    // {
    //     return $this->hasManyThrough(Episode::class, Season::class);
    // }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('name');
        });
    }


}
