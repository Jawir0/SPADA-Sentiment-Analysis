# SPADA Sentiment Analysis System

Sistem analisis sentimen terintegrasi yang dibangun untuk memproses dan menganalisis umpan balik/komentar pengguna secara otomatis menggunakan Machine Learning.

## 🚀 Deskripsi Proyek
Sistem ini terdiri dari dua komponen utama:
1. **Web Interface (Laravel):** Antarmuka web untuk input data dan dashboard hasil analisis.
2. **AI Engine (Python/Flask):** API yang menjalankan model Machine Learning (Naive Bayes) untuk mengklasifikasikan teks menjadi Positif, Negatif, atau Netral.

## 🛠️ Teknologi yang Digunakan
* **Web Framework:** Laravel (PHP)
* **AI/ML API:** Flask (Python)
* **Machine Learning:** Scikit-Learn (Naive Bayes Classifier, TF-IDF)
* **Database:** MySQL
* **Deployment:** Railway / Render (Ready)

## 📂 Struktur Proyek
```text
/
├── web-laravel/    # Folder aplikasi Laravel
└── api-python/     # Folder API Python (Flask)
    ├── app.py
    ├── models/     # Folder penyimpanan model .pkl
    └── requirements.txt
