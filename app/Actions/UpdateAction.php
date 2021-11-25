<?php

namespace App\Actions;

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
