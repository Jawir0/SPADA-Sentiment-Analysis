<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Admin</title>
</head>
<body class="bg-slate-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-teal-600">Login Admin SPADA</h2>
        
        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-2 mb-4 rounded text-sm">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <label class="block text-sm font-medium mb-1">Email / Username</label>
            <input type="text" name="email" class="w-full border p-2 rounded mb-4" required>
            
            <label class="block text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded mb-4" required>
            
            <button class="w-full bg-teal-600 hover:bg-teal-700 text-white p-2 rounded font-bold">Masuk</button>
        </form>
    </div>
</body>
</html>