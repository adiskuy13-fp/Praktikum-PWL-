@extends('layouts.app')

@section('title', 'Daftar Product')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Daftar Product</h1>
    <a href="{{ route('product.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">
        Add Product
    </a>
</div>

@if (session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Code</th>
                <th class="px-4 py-3">Stock</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="border-t">
                    <td class="px-4 py-3">
                        {{ $products->firstItem() + $loop->index }}
                    </td>
                    <td class="px-4 py-3">{{ $product->name }}</td>
                    <td class="px-4 py-3">{{ $product->code }}</td>
                    <td class="px-4 py-3">{{ $product->stock }}</td>
                    <td class="px-4 py-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2 flex-wrap">
                            <a href="{{ route('product.show', $product) }}"
                               class="px-3 py-1 bg-sky-500 text-white rounded">
                                View
                            </a>
                            <a href="{{ route('product.edit', $product) }}"
                               class="px-3 py-1 bg-amber-500 text-white rounded">
                                Edit
                            </a>
                            <form action="{{ route('product.destroy', $product) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center">
                        Data Empty
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection
