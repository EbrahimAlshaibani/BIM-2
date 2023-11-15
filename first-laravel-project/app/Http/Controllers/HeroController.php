<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heros = Hero::all();
        return view("hero.index", compact("heros"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("hero.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Hero::create($request->all());
        return redirect()->route('heros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        return view('hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        return view('hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        Hero::findOrFail($hero->id)->update($request->all());
        return redirect()->route('heros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        Hero::findOrFail($hero->id)->delete();
        return redirect()->route('heros.index');
    }
}
