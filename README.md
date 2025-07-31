# 🏁 Tugas Akhir (TA) - Final Project

**Nama Mahasiswa**: [Aji Wahyu Admaja Utama]  
**NRP**: [05111940000073]  
**Judul TA**: [Pengembangan Visualisasi Berbasis Website untuk Audiometri menggunakan KNN]  
**Dosen Pembimbing**: [Fajar Baskoro S.Kom., M.T.]  
**Dosen Ko-pembimbing**: [Prof. Daniel O. Siahaan., S.Kom., M.Sc., P.D.Eng.]

---

## 📺 Demo Aplikasi  

[![Demo Aplikasi](https://i3.ytimg.com/vi/6mfrl0J2aMU/maxresdefault.jpg)](https://youtu.be/6mfrl0J2aMU)  
*Klik gambar di atas untuk menonton demo*

---


## 🛠 Panduan Instalasi & Menjalankan Software  

### Prasyarat  
- Daftar dependensi:
  - php 8.1+

### Langkah-langkah  
1. **Clone Repository**  
   ```bash
   git clone https://github.com/wahyua26/audiovispro.git
   ```
2. **Instalasi Dependensi**
   ```bash
   cd audiovispro
   composer install
   ```
3. **Konfigurasi**
- Salin/rename file .env.example menjadi .env
  ```bash
   cp .env.example .env
   ```
- Lalu buka file .env dan sesuaikan bagian berikut dengan database lokal, ganti nama_database sesuai nama database MySQL 
  ```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=nama_database
  DB_USERNAME=root
  DB_PASSWORD=
   ```
- Generate App Key Laravel
  ```bash
  php artisan key:generate
   ```
- Migrate & Seed, Pastikan database sudah dibuat di MySQL.
  ```bash
  php artisan migrate
  php artisan db:seed
   ```
4. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```
   Akan muncul
   ```bash
   Starting Laravel development server: http://127.0.0.1:8000
   ```
   Buka di browser: http://127.0.0.1:8000

---

## 📚 Dokumentasi Tambahan

- [![Diagram Arsitektur]](docs/architecture.png)
- [![Struktur Basis Data]](docs/pdm.png)
- [![Data Hasil Audiometri]](docs/data.sql)
- [![Dataset Rekomendasi]](docs/dataset.csv)

---

## ⁉️ Pertanyaan?

Hubungi:
- Penulis: [05111940000073@student.its.ac.id]
- Pembimbing Utama: [fajar@if.its.ac.id]
