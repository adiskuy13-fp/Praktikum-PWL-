@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')
<h1 class="text-3xl font-bold mb-6">Product Detail</h1>

<div class="bg-white rounded shadow p-6 max-w-3xl">
    <table class="w-full">
        <tr class="border-b">
            <th class="text-left py-3">Product Name</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr class="border-b">
            <th class="text-left py-3">Product Code</th>
            <td>{{ $product->code }}</td>
        </tr>
        <tr class="border-b">
            <th class="text-left py-3">Stock</th>
            <td>{{ $product->stock }}</td>
        </tr>
        <tr>
            <th class="text-left py-3">Price</th>
            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
        </tr>
    </table>
</div>

<div class="mt-4 flex gap-2">
    <a href="{{ route('product.index') }}"
       class="px-4 py-2 bg-gray-200 rounded">Back</a>
    <a href="{{ route('product.edit', $product) }}"
       class="px-4 py-2 bg-amber-500 text-white rounded">Edit Product</a>
</div>
@endsection
