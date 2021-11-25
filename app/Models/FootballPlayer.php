<?php

namespace App\Models;

use App\Models\Athlete;
use App\Models\FootballPosition;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FootballPlayer extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function footballPosition()
    {
        return $this->belongsTo(FootballPosition::class);
    }
}
