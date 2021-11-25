<?php

namespace App\Http\Controllers;

use App\Http\Resources\FootballPositionCollection;
use App\Http\Resources\FootballPositionResource;

use App\Models\FootballPosition;

class FootballPositionController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: FootballPositionCollection::class,
            model: FootballPosition::class,
            orderByColumn: 'position',
            relationships: ['footballPlayer'],
            resource: FootballPositionResource::class
        );
    }
}
