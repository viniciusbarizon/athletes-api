<?php

namespace App\Actions;

use Illuminate\Http\Resources\Json\JsonResource;

class DestroyAction
{
    public function execute(int $id, string $model, string $resource): JsonResource
    {
        return new $resource(
            tap($model::findOrFail($id))->delete()
        );
    }
}
