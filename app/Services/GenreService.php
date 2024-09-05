<?php

namespace App\Services;

use App\Models\Genre;

class GenreService
{
    /** @throws \Exception */

    public function genreList()
    {
        return Genre::all();
    }
}
