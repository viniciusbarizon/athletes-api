<?php

namespace App\Http\Controllers;

use App\Http\Resources\FootballPlayerCollection;

use App\Models\FootballPlayer;

class FootballPlayerController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: FootballPlayerCollection::class,
            model: FootballPlayer::class,
            orderBy: 'athlete_id',
            relationships: ['athlete', 'footballPosition']
        );
    }
}
