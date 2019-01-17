<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use App\Repositories\MagazineRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;


class MagazinesController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $paginator = MagazineRepository::init()
            ->filter($request->all())
            ->select(['id', 'name'])
            ->paginate(Config::get('app.paginate_limit'));

        return response()->json($paginator);
    }

    public function view(int $id): JsonResponse
    {
        return response()->json(Magazine::with('publisher')->findOrFail($id));
    }
}
