<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Evaluasi SPADA UHO</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm px-4 py-4 sm:px-6 lg:px-8 border-b border-slate-100">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <!-- Bagian Kiri: Logo & Judul -->
            <div class="flex items-center gap-3">
                <div class="bg-teal-600 text-white p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-800">SPADA Analytics</h1>
                </div>
            </div>

            <!-- Bagian Kanan: Tombol Kembali -->
            <div>
                <a href="{{ url('/dashboard') }}" class="text-slate-600 hover:text-teal-600 font-medium text-sm flex items-center gap-2 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Dashboard
                </a>
            </div>

        </div>
    </nav>

    <!-- Konten Utama (Form Terpusat) -->
    <main class="flex-grow flex items-center justify-center p-4 sm:p-6">
        
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            
            <!-- Header Form -->
            <div class="bg-teal-600 px-6 py-8 text-center sm:px-10">
                <h2 class="text-2xl font-bold text-white mb-2">Evaluasi SPADA UHO</h2>
                <p class="text-teal-100 text-sm">
                    Suara Anda sangat berarti. Komentar yang Anda berikan akan dianalisis secara otomatis oleh sistem AI kami untuk meningkatkan kualitas pembelajaran daring.
                </p>
            </div>

            <!-- Body Form -->
            <div class="p-6 sm:p-10">
                <!-- Arahkan action form ini ke route POST Laravel nantinya -->
                <form action="{{ url('/survey/submit') }}" method="POST" class="space-y-6">
                    
                    <!-- Token Keamanan Laravel (Wajib ada di Laravel) -->
                    @csrf

                    <!-- Input Fakultas -->
                    <div>
                        <label for="fakultas" class="block text-sm font-semibold text-slate-700 mb-2">Asal Fakultas</label>
                        <select name="fakultas" id="fakultas" required class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 outline-none transition text-slate-600 bg-slate-50">
                            <option value="" disabled selected>Pilih Fakultas Anda...</option>
                            <option value="FT">Fakultas Teknik (FT)</option>
                            <option value="FMIPA">Fakultas Matematika & Ilmu Pengetahuan Alam (FMIPA)</option>
                            <option value="FISIP">Fakultas Ilmu Sosial & Ilmu Politik (FISIP)</option>
                            <option value="FEB">Fakultas Ekonomi & Bisnis (FEB)</option>
                            <option value="FKIP">Fakultas Keguruan & Ilmu Pendidikan (FKIP)</option>
                            <option value="FAPERTA">Fakultas Pertanian (FAPERTA)</option>
                            <option value="FKM">Fakultas Kesehatan Masyarakat (FKM)</option>
                            <option value="FH">Fakultas Hukum (FH)</option>
                            <option value="FIB">Fakultas Ilmu Budaya (FIB)</option>
                            <option value="FK">Fakultas Kedokteran (FK)</option>
                            <option value="FPIK">Fakultas Perikanan dan Ilmu Kelautan (FPIK)</option>
                            <option value="FPt">Fakultas Peternakan (FPt)</option>
                            <option value="FF">Fakultas Farmasi (FF)</option>
                            <!-- Tambahkan fakultas lainnya sesuai kebutuhan kampus -->
                        </select>
                    </div>

                    <!-- Input Rating -->
                    <div>
                        <label for="rating" class="block text-sm font-semibold text-slate-700 mb-2">Rating Pengalaman Penggunaan</label>
                        <select name="rating" id="rating" required class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 outline-none transition text-slate-600 bg-slate-50">
                            <option value="" disabled selected>Berikan penilaian Anda...</option>
                            <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Baik & Lancar)</option>
                            <option value="4">⭐⭐⭐⭐ (4 - Baik)</option>
                            <option value="3">⭐⭐⭐ (3 - Cukup)</option>
                            <option value="2">⭐⭐ (2 - Buruk & Sering Bermasalah)</option>
                            <option value="1">⭐ (1 - Sangat Buruk / Tidak Bisa Digunakan)</option>
                        </select>
                    </div>

                    <!-- Input Komentar/Ulasan -->
                    <div>
                        <label for="review" class="block text-sm font-semibold text-slate-700 mb-2">Komentar & Ulasan Bebas</label>
                        <textarea name="review" id="review" rows="5" placeholder="Ceritakan detail pengalaman Anda. Apa yang sudah bagus? Apa yang perlu diperbaiki? (Misal: Kecepatan server, fitur upload tugas, dll)..." required class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 outline-none transition text-slate-600 bg-slate-50 resize-y"></textarea>
                        <p class="mt-2 text-xs text-slate-400">Data Anda akan diproses oleh sistem untuk diklasifikasikan sebagai sentimen positif, negatif, atau netral.</p>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 px-4 rounded-lg transition shadow-md shadow-teal-200 flex justify-center items-center gap-2">
                            Kirim Evaluasi
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </div>

                </form>
            </div>
            
        </div>

    </main>

    <!-- Footer Kecil -->
    <footer class="py-6 text-center text-sm text-slate-400">
        &copy; {{ date('Y') }} SPADA Analytics UHO
    </footer>

</body>
</html>