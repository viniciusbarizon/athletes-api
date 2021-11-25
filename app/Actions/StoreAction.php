<?php

namespace App\Actions;

use Illuminate\Database\QueryException;

class StoreAction
{
    public function execute(string $model, array $record)
    {
        try {
            $model::create($record);
        }
        catch (QueryException) {
            return response('Please, do not use values used by other records', 403);
        }
    }
}
