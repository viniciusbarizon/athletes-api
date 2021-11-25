<?php

namespace App\Http\Controllers;

use App\Http\Resources\KarateTypeCollection;
use App\Http\Resources\KarateTypeResource;

use App\Models\KarateType;

class KarateTypeController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: KarateTypeCollection::class,
            model: KarateType::class,
            orderByColumn: 'type',
            relationships: ['karatecas'],
            resource: KarateTypeResource::class
        );
    }
}
