<!-- resources/views/products/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 50%;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="file"],
        form button {
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            width: 100%;
            box-sizing: border-box;
        }

        form input[type="file"] {
            width: auto;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        form button:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #4CAF50;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #ffff;
            color: #343a40;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input name="name" placeholder="Product Name" type="text" required>
        </div>
        <div>
            <input name="price" placeholder="Price" type="number" step="0.01" required>
        </div>
        <div>
            <input name="stock" placeholder="Stock" type="number" required>
        </div>
        <div>
            <input name="img" type="file" accept="image/*">
        </div>
        <div>
            <button type="submit">Create Product</button>
        </div>
    </form>

    <a href="{{ route('products.index') }}" class="back-link">Back to Product List</a>

    <!-- FOOTER -->
    <footer class="text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Greensy Market. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
