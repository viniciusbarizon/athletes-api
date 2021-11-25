<?php

namespace App\Http\Controllers;

use App\Http\Resources\AthleteCollection;

use App\Models\Athlete;

class AthleteController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: AthleteCollection::class,
            model: Athlete::class,
            orderByColumn: 'name',
            relationships: ['footballPlayer', 'karateca', 'sport']
        );
    }
}
