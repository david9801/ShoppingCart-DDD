@extends('layout.app')

@section('title', 'Products')

@section('content')
    <div class="container">
        <h1 class="my-4">Lista de productos</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            @foreach ($productsArray as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product['name'] }}</h4>
                            <h5>${{ $product['price'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <form method="POST" action="{{ route('cart-add', ['product' => $product['id']]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity">Cantidad:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
