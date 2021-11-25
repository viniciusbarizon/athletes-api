<?php

namespace App\Models;

use App\Models\Athlete;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karateca extends Model
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

    public function belt()
    {
        return $this->belongsTo(KarateBelt::class);
    }

    public function type()
    {
        return $this->belongsTo(KarateType::class);
    }
}
