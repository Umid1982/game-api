<?php

namespace App\Http\Controllers\Api;

use App\Console\Constants\GenreResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Services\GenreService;

class GenreController extends Controller
{
    public function __construct(protected readonly GenreService $genreService)
    {
    }

    public function __invoke()
    {
        $data = $this->genreService->genreList();

        return response([
            'data' => GenreResource::collection($data),
            'message' => GenreResponseEnum::GENRE_LIST,
            'success' => true
        ]);
    }
}
