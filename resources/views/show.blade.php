<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>   
</head>
<body class="bg-gray-50">
    <div class="container mx-auto max-w-3x1 px-6 py-10">
        <h1 class="text-3x1 font-bold mb-6">Product Detail</h1>

        <div class="bg-white rounded shadow p-6">
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
            <tr class="border-b">
                <th class="text-left py-3">Price</th>
                <td>${{ number_format($product->price, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="mt-4 flex gap-2">
        <a href="{{ route('product.index') }}"
</body>
</html>