<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Models\Tag;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    // 🧾 List or Search Translations
    public function index(Request $request)
    {
        $query = Translation::with('tags');

        if ($request->has('key')) {
            $query->where('key', 'like', '%' . $request->key . '%');
        }

        if ($request->has('content')) {
            $query->where('content', 'like', '%' . $request->content . '%');
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('name', $request->tag);
            });
        }

        return response()->json($query->paginate(20));
    }

    // ➕ Create Translation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|unique:translations,key',
            'content' => 'required|string',
            'locale' => 'required|string',
            'tags' => 'array' // ['mobile', 'web']
        ]);

        $translation = Translation::create($validated);

        if (!empty($validated['tags'])) {
            $tagIds = [];
            foreach ($validated['tags'] as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $translation->tags()->sync($tagIds);
        }

        return response()->json($translation->load('tags'), 201);
    }

    // ✏️ Update Translation
    public function update(Request $request, $id)
    {
        $translation = Translation::findOrFail($id);

        $validated = $request->validate([
            'key' => 'string|unique:translations,key,' . $translation->id,
            'content' => 'string',
            'locale' => 'string',
            'tags' => 'array'
        ]);

        $translation->update($validated);

        if (isset($validated['tags'])) {
            $tagIds = [];
            foreach ($validated['tags'] as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $translation->tags()->sync($tagIds);
        }

        return response()->json($translation->load('tags'));
    }

    // 📤 Export Translations (JSON, Fast)
    public function export()
    {
        $translations = Translation::with('tags')->latest('updated_at')->take(10000)->get();

        return response()->json([
            'data' => $translations
        ]);
    }
}
