<?php

namespace App\Actions;

class DestroyAction
{
    public function execute($id, $model)
    {
        $model::findOrFail($id)->delete();
    }
}
