<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Http; // Tambahkan ini untuk memanggil API

class ReviewController extends Controller
{
   public function index()
    {
        // 1. Ambil data asli dari database (Bentuk Objek)
        $reviews = Review::latest()->get();
        
        $totalReviews = $reviews->count();
        $avgRating = 0;
        $pctPositif = 0;
        $pctNegatif = 0;
        $pctNetral = 0;
        
        // Array default
        $ratingCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
        $sentimentCounts = ['Negatif' => 0, 'Positif' => 0, 'Netral' => 0];

        if ($totalReviews > 0) {
            $avgRating = round($reviews->avg('rating'), 1);

            $sentimentCounts['Positif'] = $reviews->where('sentiment_label', 'Positif')->count();
            $sentimentCounts['Negatif'] = $reviews->where('sentiment_label', 'Negatif')->count();
            $sentimentCounts['Netral'] = $reviews->where('sentiment_label', 'Netral')->count();

            $pctPositif = round(($sentimentCounts['Positif'] / $totalReviews) * 100);
            $pctNegatif = round(($sentimentCounts['Negatif'] / $totalReviews) * 100);
            $pctNetral = round(($sentimentCounts['Netral'] / $totalReviews) * 100);

            for ($i = 1; $i <= 5; $i++) {
                $ratingCounts[$i] = $reviews->where('rating', $i)->count();
            }
        }

        return view('dashboard', compact(
            'reviews', 'totalReviews', 'avgRating', 'ratingCounts',
            'pctPositif', 'pctNegatif', 'pctNetral',
            'sentimentCounts',
        ));
    }

    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'fakultas' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string'
        ]);

        // 2. Hubungi API Python untuk mendapatkan prediksi sentimen
        try {
            $response = Http::post('http://127.0.0.1:5000/predict', [
                'text' => $request->review
            ]);

            // Ambil hasil dari JSON Python
            $hasil = $response->json();
            $sentiment = $hasil['sentiment'] ?? 'Netral'; // Default ke Netral jika tidak ada hasil

        } catch (\Exception $e) {
            // Jika Python API mati, setel ke Netral agar web tidak error
            $sentiment = 'Netral';
        }

        // 3. Simpan ke Database
        $review = new Review();
        $review->fakultas = $request->fakultas;
        $review->rating = $request->rating;
        $review->review_text = $request->review;
        $review->sentiment_label = $sentiment; // Hasil dari Model Machine Learning Asli!
        $review->save();

        // 4. Kembali ke Dashboard
        return redirect('/dashboard');
    }
}