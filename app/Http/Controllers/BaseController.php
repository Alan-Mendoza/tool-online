<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Http\Requests\StoreBaseRequest;
use App\Http\Requests\UpdateBaseRequest;
use Illuminate\Support\Facades\Gate;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('base-index'), 403);

        return view('bases.index')->with([
            'bases' => Base::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('base-create'), 403);

        return view('bases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBaseRequest $request)
    {
        $base = Base::create($request->only('name'));

        return redirect()->route('bases.index')->with('success', 'Base creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Base $basis)
    {
        abort_if(Gate::denies('base-show'), 403);

        return view('bases.show')->with([
            'base' => $basis,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Base $basis)
    {
        abort_if(Gate::denies('base-edit'), 403);

        return view('bases.edit')->with([
            'base' => $basis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBaseRequest $request, Base $basis)
    {
        $basis->update($request->only('name'));

        return redirect()->route('bases.index')->with('success', 'Base actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Base $basis)
    {
        abort_if(Gate::denies('base-destroy'), 403);

        $basis->delete();

        return redirect()->route('bases.index')->with('success', 'Base eliminada correctamente');
    }
}
