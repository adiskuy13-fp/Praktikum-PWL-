
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR PRODUCT</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 26px;
            margin: 0;
        }

        a {
            text-decoration: none;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            color: white;
            border-radius: 4px;
            font-size: 12px;
            border: none;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #0d6efd;
        }

        .btn-red {
            background-color: #dc3545;
        }

        .btn-green {
            background-color: #198754;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .actions form {
            display: inline-flex;
            margin: 0;
        }
    </style>
</head>

<body>


<div class="header">
    <h1>DAFTAR PRODUCT</h1>

    <div class="actions">
        <a href="{{ route('products.create') }}" class="btn btn-blue">
            ADD PRODUCT
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-red">
                LOGOUT
            </button>
        </form>
    </div>
</div>


    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>PRODUCT NAME</th>
                <th>CODE</th>
                <th>STOCK</th>
                <th>PRICE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        {{ number_format($product->price, 2, ',', '.') }}
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('products.show', $product->id) }}"
                               class="btn btn-green">
                                DETAIL
                            </a>

                            <a href="{{ route('products.edit', $product->id) }}"
                               class="btn btn-blue">
                                EDIT
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-red">
                                    DELETE
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">
                        Belum ada data produk.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
