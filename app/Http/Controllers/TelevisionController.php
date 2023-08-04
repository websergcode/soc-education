<?php

namespace App\Http\Controllers;

use App\Actions\Television\StoreTelevisionAction;
use App\Http\Requests\Television\IndexTelevisionRequest;
use App\Http\Requests\Television\StoreTelevisionRequest;
use App\Http\Requests\Television\UpdateTelevisionRequest;
use App\Models\Television;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TelevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexTelevisionRequest $request): View
    {
        $data = $request->validated();

        $televisions = Television::query()
            ->when($request->filled('brand'), fn($q) => $q->where('brand', $data['brand']))
            ->when($request->filled('size'), fn($q) => $q->where('size', $data['size']))
            ->when($request->filled('is_smart'), fn($q) => $q->where('is_smart', $data['is_smart']))
            ->when($request->filled('price'), fn($q) => $q->where('price', $data['price']))
            ->when($request->filled('model'), fn($q) => $q->where('model', $data['model']))
            ->get();

        return view('televisions.index', compact('televisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('televisions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTelevisionRequest $request, StoreTelevisionAction $storeTelevisionAction): JsonResponse
    {
        $data = $request->validated();

        if ($storeTelevisionAction->execute(data: $data)) {
            return response()->json(['message' => 'Телевизор успешно добавлен'], 200);
        }

        return response()->json(['message' => 'Не удалось добавить телевизор'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $television = Television::findOrFail($id);

        return view('televisions.show', compact('television'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Television $television)
    {
        return view('televisions.edit', compact('television'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTelevisionRequest $request, Television $television): JsonResponse
    {
        $data = $request->validated();

        if ($television->update($data)) {
            return response()->json(['message' => 'Телевизор успешно обновлен'], 200);
        }

        return response()->json(['message' => 'Не удалось обновить телевизор'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
