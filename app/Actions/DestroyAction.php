<?php

namespace App\Actions;

use Illuminate\Http\Resources\Json\JsonResource;

class DestroyAction
{
    public function execute($id, $model, $resource): JsonResource
    {
        return new $resource($model::findOrFail($id)->delete());
    }
}
