<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexAction
{
    public function execute(string $collection, Model $model, string $orderBy): ResourceCollection
    {
        return new $collection($model::orderBy($orderBy)->get());
    }
}
