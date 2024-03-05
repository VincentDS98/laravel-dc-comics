<?php

namespace App\Http\Controllers\Adimn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index'.compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newComicData = $request->all();
        $comic = new Comic();
        $comic->title = $newComicData['title'];
        $comic->description = $newComicData['description'];
        $comic->thumb = $newComicData['thumb'];
        $comic->price = $newComicData['price'];
        $comic->series = $newComicData['series'];
        $comic->sale_date = $newComicData['sale_date'];
        $comic->type = $newComicData['type'];
        $explodeArtists = explode(',',$newComicData['artisan']);
        $comic->artists = json_encode($explodeArtists);
        $explodeWriters = explode('|',$newComicData['artisan']);
        $comic->writers = str_replace(',','|',$newComicData['writers']);
        $comic->save();
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::findorFail();
        return view ('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
