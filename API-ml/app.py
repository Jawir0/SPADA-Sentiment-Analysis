from flask import Flask, request, jsonify
import joblib

app = Flask(__name__)

# 1. Load Model dan TF-IDF menggunakan joblib
try:
    tfidf = joblib.load('tfidf (1).pkl')
    model = joblib.load('model_nb (2).pkl')
    print("Model dan TF-IDF berhasil dimuat!")
except Exception as e:
    print(f"Gagal memuat model: {e}")

@app.route('/predict', methods=['POST'])
def predict_sentiment():
    # Tangkap data teks dari Laravel
    data = request.get_json()
    review_text = data.get('text', '')

    if not review_text:
        return jsonify({'error': 'Tidak ada teks yang diberikan'}), 400

    try:
        # 2. Preprocessing / Transformasi dengan TF-IDF
        text_vectorized = tfidf.transform([review_text])

        # 3. Prediksi menggunakan Naive Bayes
        prediction = model.predict(text_vectorized)
        
        # Ambil hasil string (Positif, Negatif, atau Netral)
        sentiment_result = prediction[0]

        # Kirim hasil kembali ke Laravel
        return jsonify({
            'sentiment': sentiment_result
        })
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    # Jalankan API di port 5000
    app.run(host='0.0.0.0', port=5000, debug=True)