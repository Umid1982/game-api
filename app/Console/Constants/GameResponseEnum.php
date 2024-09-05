<?php

namespace App\Console\Constants;

enum GameResponseEnum: string
{
    case GAME_LIST = "Games list";
    case GAME_STORE = "Game store";
    case GAME_SHOW = "Game show";
    case GAME_UPDATE = "Game updated";
    case GAME_DELETE = "Game deleted";
    case GAME_DELETE_FAILED = "Game delete failed";
}
