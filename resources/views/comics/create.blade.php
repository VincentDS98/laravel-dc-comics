@extends('layouts.app')

@section('page-title', 'Comic Create')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Comic Create
            </h1>

            <form action="{{ route('comics.store') }}" method="post">
                @csrf {{-- <--- A cosa serve? --}}

                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" required maxlenght="256">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="inserisci la descrizione" required maxlenght="1024"></textarea>
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label">Thumb</label>
                    <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci la thumb"  maxlenght="1024">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci il titolo" required min="1.00" max="9999.99" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="series" class="form-label">series</label>
                    <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie" required maxlenght="64">
                </div>

                <div class="mb-3">
                    <label for="sale_date" class="form-label">sale_date</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la sale_date" >
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">type</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Inserisci il tipo" required maxlenght="32">
                </div>

                <div>
                    <button type="submit" class="btn btn-success">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
