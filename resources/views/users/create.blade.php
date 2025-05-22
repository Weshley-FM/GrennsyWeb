<div style="
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #eef2f7;
    font-family: Arial, sans-serif;
">
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" style="
        width: 100%;
        max-width: 400px;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    ">
        @csrf
        <label style="display: block; margin-bottom: 6px; font-weight: bold;">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required style="
            width: 100%; padding: 10px; margin-bottom: 15px;
            border: 1px solid #ccc; border-radius: 5px;
        ">

        <label style="display: block; margin-bottom: 6px; font-weight: bold;">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required style="
            width: 100%; padding: 10px; margin-bottom: 15px;
            border: 1px solid #ccc; border-radius: 5px;
        ">

        <label style="display: block; margin-bottom: 6px; font-weight: bold;">Password:</label>
        <input type="password" name="password" required style="
            width: 100%; padding: 10px; margin-bottom: 5px;
            border: 1px solid #ccc; border-radius: 5px;
        ">
        <small style="display: block; margin-bottom: 15px; color: #555;">Must be at least 6 characters</small>

        <label style="display: block; margin-bottom: 6px; font-weight: bold;">Confirm Password:</label>
        <input type="password" name="password_confirmation" required style="
            width: 100%; padding: 10px; margin-bottom: 15px;
            border: 1px solid #ccc; border-radius: 5px;
        ">

        <label style="display: block; margin-bottom: 6px; font-weight: bold;">Role:</label>
        <select name="role" required style="
            width: 100%; padding: 10px; margin-bottom: 15px;
            border: 1px solid #ccc; border-radius: 5px;
        ">
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <label style="display: block; margin-bottom: 6px; font-weight: bold;">Profile Picture:</label>
        <input type="file" name="profile_picture" style="margin-bottom: 10px;">

        <button type="submit" style="
            width: 100%; background-color: #28a745; color: white;
            padding: 12px; border: none; border-radius: 6px;
            font-weight: bold; cursor: pointer;
        ">Save</button>
    </form>
</div>
