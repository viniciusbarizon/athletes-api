<?php

namespace App\Http\Controllers;

use App\Http\Resources\NoteCollection;
use App\Models\Note;

class NoteController extends ActionController
{
    public function __construct()
    {
        parent::__construct(
            collection: NoteCollection::class,
            model: Note::class,
            orderByColumn: 'created_at',
            orderByDirection: 'desc',
            relationships: ['karatecas']
        );
    }
}
