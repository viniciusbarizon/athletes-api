<?php

namespace App\Models;

use App\Models\Karateca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KarateType extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function karatecas()
    {
        return $this->hasMany(Karateca::class);
    }
}
