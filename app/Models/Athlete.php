<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function footballPlayer()
    {
        return $this->hasOne(FootballPlayer::class);
    }

    public function karateca()
    {
        return $this->hasOne(Karateca::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function tennisPlayer()
    {
        return $this->hasOne(TennisPlayer::class);
    }
}
