IOT SIMALAS Monitoring System

Sistem ini merupakan platform monitoring berbasis Internet of Things yang dirancang untuk mendukung proses identifikasi, pendataan, dan pengelolaan informasi perangkat dan aktivitas lapangan. Sistem terdiri dari tiga komponen utama yaitu modul hardware berbasis ESP32 dan Arduino Mega, backend server berbasis PHP dan MySQL, serta frontend dashboard berbasis HTML, CSS, dan JavaScript.

Tujuan utama proyek ini ialah menyediakan alur monitoring yang terintegrasi antara perangkat fisik dan sistem informasi berbasis web dengan proses komunikasi yang stabil, terstruktur, dan dapat dikembangkan untuk lingkungan skala kecil maupun besar.

Fitur Utama

Pemantauan perangkat real time melalui koneksi jaringan berbasis HTTP.

Integrasi hardware ESP32 dan Arduino Mega dengan protokol serial untuk pengiriman data sensor.

Mekanisme input, pencatatan, dan penyimpanan data melalui backend server.

Dashboard admin untuk visualisasi data monitoring menggunakan template SB Admin 2.

Struktur kode modular agar mudah dikembangkan untuk perangkat atau sensor tambahan.

Komunikasi terarah antara frontend, backend, dan hardware agar sistem dapat bekerja secara sinkron.

Arsitektur Sistem

Arsitektur sistem ini terdiri dari tiga lapisan utama.

1. Hardware Layer

Bagian ini menggunakan ESP32 sebagai pengendali komunikasi jaringan dan Arduino Mega sebagai pengolah sensor. ESP32 bertugas mengirim data ke server dan menerima instruksi, sementara Mega memproses input perangkat seperti modul sensor dan menyediakan data mentah ke ESP32. Komunikasi dilakukan menggunakan UART dengan protokol pengiriman data yang telah distandarkan.

2. Backend Layer

Backend dibuat menggunakan PHP dengan koneksi ke database MySQL. Bagian ini bertugas menerima data dari ESP32, melakukan validasi, menyimpan data ke database, serta menyediakan endpoint akses untuk frontend. Backend juga menyediakan fungsi pengambilan data untuk perangkat IoT.

3. Frontend Layer

Frontend menggunakan template Start Bootstrap SB Admin 2 untuk membangun dashboard monitoring. Pengguna dapat melihat data perangkat, status komunikasi, riwayat aktivitas, dan grafik pemantauan. Semua data diambil melalui endpoint backend menggunakan AJAX.

Struktur Repository
IOT-SIMALAS-Monitoring-System
│
├── BACKEND
│   ├── config
│   ├── api
│   ├── database
│   ├── handler
│   └── index.php
│
├── FRONTEND
│   └── startbootstrap-sb-admin-2-gh-pages
│
├── HARDWARE
│   ├── ESP32
│   └── Arduino Mega
│
├── modal2.ino
└── README.md

Bagian BACKEND berisi endpoint PHP untuk komunikasi data. FRONTEND menyimpan dashboard admin. HARDWARE menyimpan kode dan konfigurasi perangkat.

Alur Komunikasi Hardware

Arduino Mega membaca data sensor.

Mega mengirim data mentah ke ESP32 melalui komunikasi serial.

ESP32 melakukan parsing data dan mengemasnya menjadi format JSON.

Data dikirim ke server melalui HTTP POST.

Server menyimpan data ke database dan memberikan respons status.

Jika ada instruksi yang perlu dikirim kembali ke perangkat, server mengirimkan data tersebut melalui endpoint yang diakses oleh ESP32.

ESP32 meneruskan instruksi ke Arduino Mega sehingga siklus komunikasi berjalan dua arah.

Alur ini memastikan bahwa perangkat dan server selalu sinkron.

Instalasi dan Konfigurasi
Persyaratan

Backend
PHP 7 atau lebih tinggi
MySQL 5.7 atau lebih tinggi
Apache atau Nginx

Hardware
Arduino IDE
Board ESP32 Package
Library sensor sesuai kebutuhan proyek

Frontend
Browser modern dengan dukungan JavaScript
Koneksi ke backend untuk pengambilan data

Cara Instalasi Backend

Clone repository ini.

Letakkan folder BACKEND dalam direktori server seperti htdocs atau public html.

Buat database MySQL dan impor file struktur yang telah disediakan.

Sesuaikan konfigurasi kredensial database di folder config.

Pastikan endpoint seperti upload data dan get data dapat diakses melalui browser.

Cara Instalasi Frontend

Simpan folder startbootstrap-sb-admin-2-gh-pages di direktori public.

Ubah konfigurasi base URL untuk mengarah ke backend.

Jalankan dashboard melalui browser.

Cara Konfigurasi Hardware

Upload kode ESP32 yang berada dalam folder HARDWARE ke perangkat ESP32.

Upload program Arduino Mega sesuai kebutuhan sensor.

Sesuaikan baudrate komunikasi serial pada kedua perangkat.

Lakukan pengujian koneksi serial dan endpoint server sebelum digunakan dalam deployment lapangan.

Endpoint Backend

Berikut contoh endpoint dasar dalam sistem.

1. Mengirim Data Sensor

Metode: POST
Format: JSON
Field wajib: device id, tipe data, nilai data, timestamp

2. Mengambil Data Monitoring

Metode: GET
Output: JSON berisi data sensor terbaru atau data historis

3. Mengambil Instruksi untuk Perangkat

Metode: GET
Output: instruksi yang wajib dieksekusi ESP32

Dokumentasi endpoint detail tersedia di folder BACKEND.

Pengembangan dan Skalabilitas

Sistem ini dirancang agar mudah dikembangkan. Skala dapat ditingkatkan dengan:

Menambah jenis sensor baru tanpa mengubah inti backend.

Mengubah protokol komunikasi dari HTTP menjadi MQTT jika diperlukan untuk efisiensi.

Menambah fitur dashboard seperti grafik waktu nyata atau deteksi anomali.

Membuat mekanisme autentikasi perangkat.

Penggunaan database relasional memudahkan perluasan fitur penyimpanan data.

Troubleshooting

Data tidak masuk ke server
Periksa konfigurasi URL endpoint dan pastikan ESP32 terhubung ke jaringan.

Dashboard tidak menampilkan data
Periksa AJAX request pada frontend dan pastikan format JSON sesuai.

Komunikasi serial tidak stabil
Pastikan baudrate pada ESP32 dan Arduino Mega sama serta gunakan kabel berkualitas baik.

Backend tidak dapat diakses
Pastikan Apache atau Nginx berjalan dan file permission sudah benar.


