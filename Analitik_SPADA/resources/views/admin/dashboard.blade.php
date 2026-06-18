<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Panel - SPADA</title>
</head>
<body class="bg-slate-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6">Manajemen Ulasan Mahasiswa</h1>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b">
                    <th class="p-3 text-left">Fakultas</th>
                    <th class="p-3 text-left">Komentar</th>
                    <th class="p-3 text-left">Label AI</th>
                    <th class="p-3 text-left">Aksi (Koreksi)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $item)
                <tr class="border-b">
                    <td class="p-3">{{ $item->fakultas }}</td>
                    <td class="p-3 max-w-sm truncate">{{ $item->review_text }}</td>
                    <td class="p-3 font-semibold">{{ $item->sentiment_label }}</td>
                    <td class="p-3 flex gap-2">
                        <form action="{{ route('admin.update', $item->id) }}" method="POST">
                            @csrf
                            <select name="sentiment_label" onchange="this.form.submit()" class="border rounded p-1 text-sm">
                                <option value="Positif" {{ $item->sentiment_label == 'Positif' ? 'selected' : '' }}>Positif</option>
                                <option value="Negatif" {{ $item->sentiment_label == 'Negatif' ? 'selected' : '' }}>Negatif</option>
                                <option value="Netral" {{ $item->sentiment_label == 'Netral' ? 'selected' : '' }}>Netral</option>
                            </select>
                        </form>
                        
                        <form action="{{ route('admin.delete', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>