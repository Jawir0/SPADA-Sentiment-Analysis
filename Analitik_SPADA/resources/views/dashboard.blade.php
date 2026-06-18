<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analitik SPADA UHO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800">

    <nav class="bg-white shadow-sm px-4 py-4 mb-8 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-3">
                <div class="bg-teal-600 text-white p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-800">Analitik SPADA UHO</h1>
                    <p class="text-xs text-slate-500">Analisis Sentimen & Evaluasi Pembelajaran Daring</p>
                </div>
            </div>

            <div>
                <a href="{{ url('/survey') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Beri Ulasan
                </a>
            </div>

        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                <p class="text-sm font-semibold text-slate-500 mb-1">Total Feedback</p>
                <h2 class="text-3xl font-bold text-teal-600">{{ $totalReviews ?? 0 }}</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                <p class="text-sm font-semibold text-slate-500 mb-1">Rata-rata Rating</p>
                <h2 class="text-3xl font-bold text-amber-500">{{ $avgRating ?? 0 }} <span class="text-sm font-normal text-slate-400">/ 5.0</span></h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                <p class="text-sm font-semibold text-slate-500 mb-1">Sentimen Positif</p>
                <h2 class="text-3xl font-bold text-emerald-500">{{ $pctPositif ?? 0 }}%</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                <p class="text-sm font-semibold text-slate-500 mb-1">Sentimen Negatif</p>
                <h2 class="text-3xl font-bold text-rose-500">{{ $pctNegatif ?? 0 }}%</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                <h3 class="text-lg font-semibold mb-4 text-slate-700">Distribusi Rating</h3>
                <canvas id="ratingChart" height="200"></canvas>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex flex-col items-center">
                <h3 class="text-lg font-semibold mb-4 text-slate-700 w-full text-left">Proporsi Sentimen</h3>
                <div class="w-64 h-64">
                    <canvas id="sentimentChart"></canvas>
                </div>
            </div>
        </div>

        <section class="mb-12">
    <h3 class="text-xl font-bold text-slate-800 mb-6">Analisis Performa Model AI</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
            <h4 class="text-md font-semibold text-slate-700 mb-4">Distribusi Sentimen (Data Latih)</h4>
            <img src="{{ asset('image/Distribusi_Sentimen.png2.png') }}" alt="Distribusi Sentimen" class="w-full rounded-lg border border-slate-50 object-contain">
            <p class="text-xs text-slate-400 mt-3"></p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
            <h4 class="text-md font-semibold text-slate-700 mb-4">Confusion Matrix (Heatmap)</h4>
            <img src="{{ asset('image/Jumlah_datasentimen_.png2.png') }}" alt="Heatmap Akurasi" class="w-full rounded-lg border border-slate-50 object-contain">
            <p class="text-xs text-slate-400 mt-3"></p>
        </div>
    </div>
        </section>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 mb-8">
            <h3 class="text-lg font-semibold mb-4 text-slate-700">Ulasan & Sentimen Terbaru</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                @if(isset($reviews) && count($reviews) > 0)
                    @foreach($reviews as $item)
                    <div class="border border-slate-200 p-4 rounded-lg flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center font-bold">
                                        {{ strtoupper(substr($item->fakultas, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold">Anonim</p>
                                        <p class="text-xs text-slate-500">Fakultas {{ $item->fakultas }}</p>
                                    </div>
                                </div>
                                <span class="text-amber-400 text-sm">★ {{ $item->rating }}</span>
                            </div>
                            <p class="text-sm text-slate-600 mb-4">{{ $item->review_text }}</p>
                        </div>
                        
                        <div class="mt-auto">
                            @if($item->sentiment_label == 'Positif')
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded inline-block">Positif</span>
                            @elseif($item->sentiment_label == 'Negatif')
                                <span class="px-2 py-1 bg-rose-100 text-rose-700 text-xs font-semibold rounded inline-block">Negatif</span>
                            @else
                                <span class="px-2 py-1 bg-slate-100 text-slate-700 text-xs font-semibold rounded inline-block">Netral</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-8">
                        <p class="text-slate-500">Belum ada data ulasan.</p>
                    </div>
                @endif

            </div>
        </div>
    </main>

    <script>
        // Data Default JS jika PHP mengirimkan null
        const safeData = (data) => data || 0;

        // Grafik Rating
        const ctxRating = document.getElementById('ratingChart').getContext('2d');
        new Chart(ctxRating, {
            type: 'bar',
            data: {
                labels: ['Bintang 1', 'Bintang 2', 'Bintang 3', 'Bintang 4', 'Bintang 5'],
                datasets: [{
                    label: 'Jumlah Ulasan',
                    // Menggunakan fallback data langsung ke array agar aman dari parse error
                    data: [
                        {{ $ratingCounts[1] ?? 0 }},
                        {{ $ratingCounts[2] ?? 0 }},
                        {{ $ratingCounts[3] ?? 0 }},
                        {{ $ratingCounts[4] ?? 0 }},
                        {{ $ratingCounts[5] ?? 0 }}
                    ],
                    backgroundColor: '#0d9488',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: { 
                    y: { 
                        beginAtZero: true,
                        ticks: { stepSize: 1 } 
                    } 
                }
            }
        });

        // Grafik Sentimen
        const ctxSentiment = document.getElementById('sentimentChart').getContext('2d');
        new Chart(ctxSentiment, {
            type: 'doughnut',
            data: {
                labels: ['Negatif', 'Positif', 'Netral'],
                datasets: [{
                    // Menggunakan fallback data langsung ke array
                    data: [
                        {{ $sentimentCounts['Negatif'] ?? 0 }},
                        {{ $sentimentCounts['Positif'] ?? 0 }},
                        {{ $sentimentCounts['Netral'] ?? 0 }}
                    ],
                    backgroundColor: ['#f43f5e', '#10b981', '#f59e0b'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>
</body>
</html>