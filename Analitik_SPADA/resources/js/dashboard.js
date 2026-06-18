document.addEventListener('DOMContentLoaded', function() {
    
    // Konfigurasi Chart Distribusi Rating
    const ratingCanvas = document.getElementById('ratingChart');
    if (ratingCanvas) {
        const ctxRating = ratingCanvas.getContext('2d');
        new Chart(ctxRating, {
            type: 'bar',
            data: {
                labels: ['Bintang 1', 'Bintang 2', 'Bintang 3', 'Bintang 4', 'Bintang 5'],
                datasets: [{
                    label: 'Jumlah Ulasan',
                    data: [1800, 750, 400, 300, 1000],
                    backgroundColor: '#0d9488', // Menggunakan warna teal-600 dari Tailwind
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: { 
                    y: { 
                        beginAtZero: true 
                    } 
                }
            }
        });
    }

    // Konfigurasi Chart Proporsi Sentimen
    const sentimentCanvas = document.getElementById('sentimentChart');
    if (sentimentCanvas) {
        const ctxSentiment = sentimentCanvas.getContext('2d');
        new Chart(ctxSentiment, {
            type: 'doughnut',
            data: {
                labels: ['Negatif', 'Positif', 'Netral'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: [
                        '#f43f5e', // Warna rose-500
                        '#10b981', // Warna emerald-500
                        '#f59e0b'  // Warna amber-500
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: { 
                        position: 'bottom' 
                    }
                }
            }
        });
    }
});