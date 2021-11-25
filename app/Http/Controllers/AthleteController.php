<?php

namespace App\Http\Controllers;

use App\Models\Athlete;

class AthleteController extends Controller
{
    public function __construct()
    {
        parent::__construct(collection: 'AthleteCollection', model: Athlete::class, orderBy: 'name');
    }
}
