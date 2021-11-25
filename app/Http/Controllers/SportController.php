<?php

namespace App\Http\Controllers;

use App\Http\Resources\SportCollection;
use App\Http\Resources\SportResource;

use App\Models\Sport;

class SportController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: SportCollection::class,
            model: Sport::class,
            orderByColumn: 'sport',
            relationships: ['athletes'],
            resource: SportResource::class
        );
    }
}
