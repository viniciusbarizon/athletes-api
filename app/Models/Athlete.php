<?php

namespace App\Models;

use App\Models\Sport;

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

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
