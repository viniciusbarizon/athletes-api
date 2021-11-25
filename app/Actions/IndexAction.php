<?php

namespace App\Actions;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexAction
{
    public function execute(
        string $collection,
        string $model,
        string $orderByColumn,
        string $orderByDirection,
        array $relationships): ResourceCollection
    {
        return new $collection(
            $model::with($relationships)->orderBy($orderByColumn, $orderByDirection)->get()
        );
    }
}
