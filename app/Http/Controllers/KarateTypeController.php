<?php

namespace App\Http\Controllers;

use App\Http\Resources\KarateTypeCollection;
use App\Models\KarateType;

class KarateTypeController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: KarateTypeCollection::class,
            model: KarateType::class,
            orderBy: 'type',
            relationships: ['karatecas']
        );
    }
}
