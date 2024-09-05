<?php

namespace App\Http\Controllers\Api;

use App\Console\Constants\GameResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\StoreRequest;
use App\Http\Requests\Game\UpdateRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\GameService;

class GameController extends Controller
{
    public function __construct(protected readonly GameService $gameService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->gameService->gamesList();

        return response([
            'data' => GameResource::collection($data->load('genres')),
            'message' => GameResponseEnum::GAME_LIST,
            'success' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $storeRequest)
    {
        $data = $this->gameService->storeGame($storeRequest->validated());

        return response([
            'data' => GameResource::make($data->load('genres')),
            'message' => GameResponseEnum::GAME_STORE,
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return response([
            'data' => GameResource::make($game->load('genres')),
            'message' => GameResponseEnum::GAME_SHOW,
            'success' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $updateRequest, Game $game)
    {
        $data = $this->gameService->updateGmae($updateRequest->validated(), $game);

        return response([
            'data' => GameResource::make($data->load('genres')),
            'message' => GameResponseEnum::GAME_UPDATE,
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $isSuccess = $this->gameService->delete($game);

        if (!$isSuccess) {
            return response([
                'message' => GameResponseEnum::GAME_DELETE_FAILED,
                'success' => false,
            ]);
        }

        return response([
            'message' => GameResponseEnum::GAME_DELETE,
            'success' => true
        ]);
    }
}
