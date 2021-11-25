<?php

namespace App\Actions;

use Illuminate\Database\QueryException;

class UpdateAction
{
    public function execute(array $data, int $id, string $model)
    {
        try {
            $model::findOrFail($id)->update($data);
        }
        catch (QueryException) {
            return response('Please, do not use values used by other records', 403);
        }
    }
}
