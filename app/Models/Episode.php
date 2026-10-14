<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Season;

class Episode extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['number'];
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function scopeWatched(Builder $query)
    {
        // escopo criado para ver onde o watched=true
        $query->where('watched', true);
    }
}
