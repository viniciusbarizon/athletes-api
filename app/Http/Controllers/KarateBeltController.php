<?php

namespace App\Http\Controllers;

use App\Http\Resources\KarateBeltCollection;
use App\Models\KarateBelt;

class KarateBeltController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: KarateBeltCollection::class,
            model: KarateBelt::class,
            orderByColumn: 'color',
            relationships: ['karatecas']
        );
    }
}
