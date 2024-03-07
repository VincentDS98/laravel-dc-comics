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
        return redirect()->route('comics.show',['comic'=>$comic->id]);
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
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $comicData =$request->validate([
            'title'=>'required|max:64',
            'description'=>'nullable|max:4096',
            'thumb'=>'nullable|url',
            'price'=>'nullable|number|max:30',
            'series'=>'nullable|string|max:300',
            'sale_date'=>'nullable|date|max:300',
            'type'=>'required|string|max:128',
            'artists'=>'required|string|max:640',
            'writers'=>'required|string|max:640',
        ],[
            'title.required' => 'Campo obbligatorio.',
            'title.max' => 'Lunghezza massima, :max caratteri.',
            'description.max' => 'Lunghezza massima :max caratteri.',
            'thumb.url' => 'Link immagine non valido.',
            'price.numeric' => 'Inserire un numero.',
            'price.max' => 'Massimo :max cifre.',
            'series.max' => 'Lunghezza massima :max caratteri.',
            'sale_date.date' => 'Data di vendita non  valida.',
            'type.required' => 'Campo obbligatorio.',
            'type.max' => 'Lunghezza massima :max caratteri.',
            'artists.required' => 'Campo obbligatorio.',
            'artists.max' => 'Lunghezza massima :max caratteri.',
            'writers.required' => 'Campo obbligatorio.',
            'writers.max' => 'Lunghezza massima :max caratteri.',
        ]);

        //$comicData = $request->all();
        //manipolo i dati per poi aggiornali nel db
        $comicData["price"] = floatval( $comicData ['price']);
        $supportArray = explode(",", $comicData ['artists']);
        $comicData["artists"] = json_encode($supportArray);
        $supportArray = explode(",", $comicData ['writers']);
        $comicData["writers"]= json_encode($supportArray);

        $comic->update($comicData);
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
