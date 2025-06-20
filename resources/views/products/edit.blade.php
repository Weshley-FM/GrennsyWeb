<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Sayur</title>
    <style>
        body, h1, p, form {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f7fc;
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #28a745;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="text"]:focus, input[type="number"]:focus, input[type="file"]:focus {
            border-color: #28a745;
            outline: none;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .image-preview {
            margin-bottom: 15px;
        }

        .image-preview img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
        }

        footer {
            background-color: #ffff;
            color: #343a40;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Data Sayur</h1>

        <div class="form-container">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Sayur</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price" value="{{ $product->price }}" required>
                </div>

                <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
                </div>

                <div class="form-group">
                    <label for="photo">Edit Foto</label>
                    <input type="file" name="photo" id="photo">
                    @if ($product->photo)
                        <div class="image-preview">
                            <img src="{{ asset('storage/photos/' . $product->photo) }}" alt="Current Photo">
                        </div>
                    @endif
                </div>

                <div class="button-group">
                    <button type="submit" class="btn">Update Data</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Greensy Market. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

