@extends('layout.app')

@section('title', 'ShoppingCart')

@section('content')
    <div class="container">
        <h1 class="my-4">Carrito de compras</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $item['product']['name'] }}</h5>
                                    <p class="text-muted">{{ $item['product']['description'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td>${{ $item['product']['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $item['quantity'] * $item['product']['price'] }}</td>
                        <td>
                      <p> DELETE</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Total:</strong></td>
                    <td><strong>${{ $cartItems->sum(function($item) { return $item['quantity'] * $item['product']['price']; }) }}</strong></td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
