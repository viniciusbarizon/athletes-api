<?php

namespace App\Http\Controllers;

use App\Http\Resources\KaratecaCollection;
use App\Http\Resources\KaratecaResource;

use App\Models\Karateca;

class KaratecaController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: KaratecaCollection::class,
            model: Karateca::class,
            orderByColumn: 'athlete_id',
            relationships: ['athlete', 'belt', 'type'],
            resource: KaratecaResource::class
        );
    }
}
