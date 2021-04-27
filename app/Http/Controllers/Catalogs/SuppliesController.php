<?php

namespace App\Http\Controllers\Catalogs;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Supplie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SuppliesController extends Controller
{
    public function index()
    {
        $supplies = Supplie::all();
        return Inertia::render('Catalogs/Supplies/Index')->with(compact('supplies'));
    }


    public function create()
    {
        return Inertia::render('Catalogs/Supplies/Create');
    }

    public function store(Request $request)
    {
        Supplie::create(
            $request->validate(
                [
                    'name' => ['required', 'max:50'],
                    'id_measure' => ['required', 'integer', 'max:50'],
                ]
            )
        );

        return Redirect::route('catalogs.supplies.index');
    }

    public function show($id)
    {
        $supplie = Supplie::find($id);

        return Inertia::render('Catalogs/Supplies/Show', ['supplie' => $supplie]);
    }

    public function edit($id)
    {
        $supplie = Supplie::find($id);

        return Inertia::render('Catalogs/Supplies/Edit', ['supplie' => $supplie]);
    }

    public function update(Request $request)
    {
        Supplie::where('is_active', 1)
            ->where('id', $request->id)
            ->update($request->validate(
                [
                    'id' => ['required'],
                    'name' => ['required', 'min:1', 'max:50'],
                    'id_measure' => ['required', 'integer', 'min:1', 'max:50'],
                ]
            ));

        return Redirect::route('catalogs.supplies.index');
    }

    public function destroy($id)
    {
        $supplie = Supplie::find($id);
        $supplie->is_active = !$supplie->is_active;
        $supplie->save();

        return Redirect::route('catalogs.supplies.index');
    }
}
