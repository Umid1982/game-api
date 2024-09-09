<?php

namespace App\Console\Constants;

enum GenreResponseEnum: string
{
    case GENRE_LIST = "Genres list";
    case GENRE_CANNOT_DELETE = "Cannot delete genre. There are games associated with this genre.";
    case GENRE_DELETE = "Genre deleted successfully.";
}
