<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\JsonResponse;

class PublishersController extends Controller
{
    public function list(): JsonResponse
    {
        return response()->json(
            Publisher::all(['id', 'name'])
        );
    }
}
