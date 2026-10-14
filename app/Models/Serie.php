<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Season;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $with = ['seasons'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id', 'id');
    }
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('name', 'desc');
        });
    }
    // public function scopeActive(Builder $query)
    // {
        // return $query->where('active', true);
        // $series = Serie::active()->get(); na controller para buscar dados em que active=true
    // }
}
