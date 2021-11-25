<?php

namespace App\Actions;

use Illuminate\Database\QueryException;

class StoreAction
{
    public function execute(array $data, string $model)
    {
        try {
            $model::create($data);
        }
        catch (QueryException) {
            return response('Please, do not use values used by other records', 403);
        }
    }
}
