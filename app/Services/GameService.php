<?php

namespace App\Services;

use App\Models\Game;

class GameService
{
    /** @throws \Exception */

    public function gamesList()
    {
        return Game::all();
    }

    public function storeGame($validated)
    {
        $game = Game::create($validated);
        $game->genres()->attach($validated['genres']);

        return $game;
    }

    public function updateGmae($validate, Game $game)
    {
        $game->update($validate);

        // Проверяем наличие ключа 'genres' в массиве
        if (isset($validate['genres'])) {
            if (is_array($validate['genres'])) // Проверяем, что 'genres' это массив
            {
                $game->genres()->sync($validate['genres']);
            }
        }

        return $game->refresh();
    }

    public function delete(Game $game)
    {
        $game->genres()->detach(); // Удаление всех связей в промежуточной таблице
        $game->delete();

        return true;
    }
}
