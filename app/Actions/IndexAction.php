<?php

namespace App\Actions;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexAction
{
    public function execute(string $collection, string $model, string $orderBy): ResourceCollection
    {
        return new $collection($model::orderBy($orderBy)->get());
    }
}
