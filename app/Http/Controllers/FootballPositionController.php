<?php

namespace App\Http\Controllers;

use App\Http\Resources\FootballPositionCollection;
use App\Models\FootballPosition;

class FootballPositionController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: FootballPositionCollection::class,
            model: FootballPosition::class,
            orderBy: 'position',
            relationships: ['footballPlayer']
        );
    }
}
