@extends('layout.app')

@section('title', 'ShoppingCart')

@section('content')
    <div class="container">
        <h1 class="my-4">Carrito de compras</h1>
        <div class="row">
            @foreach ($cartItems as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item['product']['name'] }}</h4>
                            <h5 class="card-subtitle mb-2 text-muted">${{ $item['product']['price'] }}</h5>
                            <p class="card-text">{{ $item['product']['description'] }}</p>
                            <p class="card-text"><small>Cantidad: {{ $item['quantity'] }}</small></p>
                            <form method="POST" action="{{ route('cart-remove', ['item_id' => $item['id']]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar del carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
