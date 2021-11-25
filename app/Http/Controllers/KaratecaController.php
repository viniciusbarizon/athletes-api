<?php

namespace App\Http\Controllers;

use App\Http\Resources\KaratecaCollection;
use App\Models\Karateca;

class KaratecaController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: KaratecaCollection::class,
            model: Karateca::class,
            orderBy: 'athlete_id',
            relationships: ['athlete', 'belt', 'type']
        );
    }
}
