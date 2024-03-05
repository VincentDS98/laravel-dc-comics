@extends('layouts.app')

@section('page-title', 'Comic Index')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Comic Index
            </h1>
            <div>
                <a href = "{{ route('comics.create') }} "class="bt btn-succes w-100">
                    aggiungi comic
                </a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Series</th>
                        <th scope="col">Sale Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foureach ($comics as $comic)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $comic->id }}</td>
                            <td>{{ $comic->title }}</td>
                            <td>{{ number_format{$comic->price,2,',','.'} }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->sale_date }}</td>
                            <td>{{ $comic->type }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary btn-sm">
                                Details
                            </a>
                            </td>
                        </tr>
                    @endfoureach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
