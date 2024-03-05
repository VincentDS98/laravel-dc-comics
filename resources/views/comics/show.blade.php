@extends('layouts.app')

@section('page-title', $comic->title )

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                {{ $comic->title }}
            </h1>

            <div class="card">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Series{{ $comic->series }}</h5>
                    <ul>
                        <li>
                             Price{{ number_format{$comic->price,2,',','.'} }} 
                        </li>

                        <li>
                             Sale-Date:{{ $comic->sale_date }} 
                        </li>

                        <li>
                             Type:{{ $comic->type }} 
                        </li>

                        <li>
                             Artists:
                                <ul>
                                   @foreach(json_decode($comic->artists, true) as $artist)
                                        <li>
                                            {{ $artist }}
                                        </li>
                                   @endforeach
                                </ul>
                        </li>

                        <li>
                             Writers:
                              <ul>
                                   @foreach(explode('|',$comic->writers) as $writer)
                                        <li>
                                            {{ $writers }}
                                        </li>
                                   @endforeach
                                </ul>
                        </li>
                    </ul>
                    <p class="card-text">
                        {{ $comic->description }}
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
