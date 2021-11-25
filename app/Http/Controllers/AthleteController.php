<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ActionController;

use App\Models\Athlete;

class AthleteController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: 'App\Http\Resources\AthleteCollection',
            model: Athlete::class,
            orderBy: 'name'
        );
    }
}
