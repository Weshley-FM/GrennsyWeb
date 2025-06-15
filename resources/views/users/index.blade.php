<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #222;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .top-actions {
            text-align: right;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 60px;
            border-radius: 50%;
        }

        .role-admin {
            color: #c0392b;
            font-weight: bold;
        }

        .role-user {
            color: #2980b9;
            font-weight: bold;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        form {
            display: inline;
        }

        /* Floating button styles */
        .floating-btn {
            position: fixed;
            top: 30px;
            left: 30px;
            background-color: #007bff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
            text-decoration: none;
            z-index: 1000;
        }

        .floating-btn:hover {
            background-color: #0056b3;
        }

        .floating-btn svg {
            fill: white;
            width: 28px;
            height: 28px;
        }

        /* Footer */
        footer {
            background-color: #1d4731;
            color: #fff;
            padding: 10px 30px 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Management</h1>

        <div class="top-actions">
            <a href="{{ route('users.create') }}" class="btn btn-add">+ Add New User</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if ($user->profile_picture)
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" />
                            @else
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                                    alt="Default Avatar"
                                />
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role === 'admin')
                                <span class="role-admin">Admin</span>
                            @else
                                <span class="role-user">User</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-edit">Edit</a>

                            <form
                                action="{{ route('users.destroy', $user) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this user?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Floating button linking to products page -->
    <a
        href="{{ route('products.index') }}"
        class="floating-btn"
        title="Go to Products"
        aria-label="Go to Products"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="white"
            viewBox="0 0 24 24"
            width="28"
            height="28"
        >
            <path
                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16zM12 3.23 18.66 7 12 10.77 5.34 7 12 3.23zM5 9.22 12 13l7-3.78v5.56l-7 4-7-4V9.22z"
            />
        </svg>
    </a>

    <footer>
        <div class="copyright">
            <p>© 2025 by Greensy. Powered and secured by Laravel</p>
        </div>
    </footer>
</body>
</html>
