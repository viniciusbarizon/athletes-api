<?php

namespace App\Actions;

use Illuminate\Database\QueryException;

class StoreAction
{
    public function execute(array $data, string $model, string $resource): mixed
    {
        try {
            return new $resource(
                $model::create($data)
            );
        }
        catch (QueryException) {
            return response('Please, do not use values used by other records', 403);
        }
    }
}
