<?php

namespace App\Http\Controllers;

use App\Http\Resources\TennisPlayerCollection;
use App\Http\Resources\TennisPlayerResource;

use App\Models\TennisPlayer;

class TennisPlayerController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: TennisPlayerCollection::class,
            model: TennisPlayer::class,
            orderByColumn: 'world_ranking',
            relationships: ['athlete'],
            resource: TennisPlayerResource::class
        );
    }
}
