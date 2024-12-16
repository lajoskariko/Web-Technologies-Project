<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\ButtonLiked;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ButtonLikedController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        ButtonLiked::dispatch(message: 'Song successfully liked');

        return response()->json(['success' => true]);
    }
}