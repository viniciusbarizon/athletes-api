<?php

namespace App\Actions;

class StoreAction
{
    public function execute(string $model, array $record)
    {
        $model::create($record);
    }
}
