<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comicsData = config('comics');

        foreach($comicsData as $index => $singleComicData)
        $comic = new Comic();
        $comic->title = $singleComicData['title'];
        $comic->description = $singleComicData['description'];
        $comic->thumb = $singleComicData['thumb'];
        $cleanPriceData = str_replace('$','',$singleComicData['price']);
        $comic->price = floatval($cleanPriceData);
        $comic->series = $singleComicData['series'];
        $comic->sale_date = $singleComicData['sale_date'];
        $comic->type = $singleComicData['type'];
        $comic->artists = json_encode($singleComicData['artisan']);
        $comic->writers = implode('|',$singleComicData['writers']);
        $comic->save();
    }
}
