<?php

namespace App\Actions;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowAction
{
    public function execute(int $id, string $model, string $resource): JsonResource
    {
        return new $resource($model::findOrFail($id));
    }
}
