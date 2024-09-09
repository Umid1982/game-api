<?php

namespace App\Services;

use App\Console\Constants\GenreResponseEnum;
use App\Models\Genre;

class GenreService
{
    /** @throws \Exception */

    public function genreList()
    {
        return Genre::all();
    }

    public function genreDelete(Genre $genre)
    {
        if ($genre->games()->count() > 0) {
            return false; // Если есть связанные игры, удаление запрещено
        }
        // Если игр нет, удаляем жанр
        $genre->delete();

        return true;
    }
}
