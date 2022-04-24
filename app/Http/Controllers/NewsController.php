<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsIndexRequest;
use App\Http\Requests\NewsShowRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;

class NewsController extends Controller
{
    public function index(NewsIndexRequest $request)
    {
        $validated = $request->validated();

        $news = News::with('roles');

        if (isset($validated['role'])) {
            $news->whereHas('roles', function (Builder $query) use ($validated) {
                $query->where('code', 'like', $validated['role']);
            });
        }

        if (isset($validated['count'])) {
            $news->paginate($validated['count'], page: $validated['page'] ?? 1);
        }

        return NewsResource::collection($news->get());
    }

    public function show(int $id, NewsShowRequest $request)
    {
        $validated = $request->validated();

        $news = News::query()->with('roles');

        if (isset($validated['role'])) {
            $news->whereHas('roles', function (Builder $query) use ($validated) {
                $query->where('code', '', $validated['role']);
            });
        }

        return new NewsResource($news->findOrFail($id));
    }
}
