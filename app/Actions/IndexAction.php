<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexAction
{
    public function execute(ResourceCollection $collection, Model $model, string $orderBy): ResourceCollection
    {
        return $collection($model::orderBy($orderBy)->get());
    }
}
