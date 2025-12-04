# IOT SIMALAS Monitoring System

**IOT SIMALAS Monitoring System** adalah platform monitoring berbasis Internet of Things yang dirancang untuk mendukung proses identifikasi, pendataan, dan pengelolaan informasi perangkat serta aktivitas lapangan secara *real time*. Sistem ini mengintegrasikan modul hardware berbasis **ESP32** dan **Arduino Mega**, backend server berbasis **PHP MySQL**, serta dashboard berbasis **HTML, CSS, dan JavaScript**.

Tujuan utama proyek ini ialah menghadirkan alur monitoring yang terintegrasi antara perangkat fisik dan sistem informasi berbasis web dengan proses komunikasi yang stabil, terstruktur, dan dapat dikembangkan untuk kebutuhan skala kecil maupun besar.

---

## Fitur Utama

- Pemantauan perangkat secara *real time* melalui jaringan berbasis HTTP.  
- Integrasi hardware ESP32 dan Arduino Mega menggunakan protokol serial.  
- Mekanisme input, pencatatan, dan penyimpanan data melalui backend server.  
- Dashboard admin untuk visualisasi monitoring menggunakan template SB Admin 2.  
- Struktur kode modular sehingga mudah dikembangkan untuk sensor tambahan.  
- Komunikasi dua arah antara frontend, backend, dan hardware.

---

## Arsitektur Sistem

Arsitektur sistem dibagi menjadi tiga lapisan.

### 1. Hardware Layer
ESP32 bertugas mengirim dan menerima data ke server, sedangkan Arduino Mega mengelola pembacaan sensor dan mengirimkan data mentah melalui UART. ESP32 mengonversi data menjadi JSON untuk dikirimkan ke backend.

### 2. Backend Layer
Backend dibangun dengan PHP dan MySQL. Backend memvalidasi data yang diterima dari perangkat IoT, menyimpannya ke database, dan menyediakan endpoint untuk frontend maupun perangkat hardware.

### 3. Frontend Layer
Frontend menggunakan SB Admin 2 untuk menampilkan data monitoring. Data diambil melalui AJAX dan ditampilkan dalam bentuk grafik, tabel, serta indikator status perangkat.

---


Sekarang aku berikan versi struktur repository yang **pasti rapi di GitHub**, karena sudah memakai monospace code block dan karakter tree yang benar.

Kamu tinggal copy paste bagian ini ke README.md.

---

### **Struktur Repository**

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


---

## Alur Komunikasi Hardware

1. Arduino Mega membaca data sensor.  
2. Data dikirim ke ESP32 melalui komunikasi serial.  
3. ESP32 mengonversi data ke format JSON.  
4. Data dikirim melalui HTTP POST ke server backend.  
5. Backend menyimpan data di database.  
6. Jika server memiliki instruksi, ESP32 mengambilnya melalui endpoint tertentu.  
7. ESP32 meneruskan instruksi ke Arduino Mega.  

---

## Instalasi dan Konfigurasi

### Persyaratan

**Backend**
- PHP 7 atau lebih tinggi  
- MySQL 5.7 atau lebih tinggi  
- Apache atau Nginx  

**Hardware**
- Arduino IDE  
- ESP32 Board Package  
- Library sensor  

**Frontend**
- Browser modern  
- Koneksi ke backend untuk memuat data

---

### Cara Instalasi Backend

1. Clone repository ini.  
2. Letakkan folder BACKEND pada direktori server seperti htdocs.  
3. Buat database dan impor struktur tabel.  
4. Sesuaikan konfigurasi kredensial database.  
5. Pastikan semua endpoint dapat diakses browser.

---

### Cara Instalasi Frontend

1. Simpan folder SB Admin 2 ke direktori publik.  
2. Ubah konfigurasi base URL untuk mengarah ke backend API.  
3. Buka dashboard melalui browser.

---

### Cara Konfigurasi Hardware

1. Upload program ESP32.  
2. Upload program Arduino Mega.  
3. Sesuaikan baudrate dan port serial.  
4. Uji komunikasi Serial dan endpoint backend.

---

## Endpoint Backend

### 1. Mengirim Data Sensor
Metode: POST  
Format: JSON  
Field wajib: device_id, tipe_data, nilai, timestamp  

### 2. Mengambil Data Monitoring
Metode: GET  
Output: JSON data terbaru atau historis  

### 3. Mengambil Instruksi Perangkat
Metode: GET  
Output: JSON instruksi untuk ESP32  

---

## Troubleshooting

**Data tidak masuk server**  
Periksa URL endpoint dan WiFi ESP32.

**Dashboard tidak muncul data**  
Pastikan backend mengirim JSON valid.

**Komunikasi serial bermasalah**  
Pastikan baudrate sama dan kabel baik.

**Backend tidak merespons**  
Pastikan Apache atau Nginx berjalan.



