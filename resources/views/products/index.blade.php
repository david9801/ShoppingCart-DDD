@extends('layout.app')
@section('title')
@section('content')
    <div class="container">
        <h1 class="my-4">Lista de productos</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <h5>${{ $product->price }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
