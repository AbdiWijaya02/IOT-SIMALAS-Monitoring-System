# ==========================================================
#  IOT SIMALAS MONITORING AND CONTROL SYSTEM FOR 3D PRINTING
# ==========================================================

project:
  name: "IOT SIMALAS Monitoring and Control System"
  summary: >
    Sistem IoT untuk monitoring dan kontrol mesin 3D Printing secara real time
    menggunakan ESP8266, PZEM-004T, DHT11, LM393 dan SSR. Data dikirim ke backend
    dan divisualisasikan melalui dashboard web.

# ====================
#  FEATURES
# ====================
features:
  - "Monitoring konsumsi daya (Volt, Ampere, Watt, kWh) melalui PZEM-004T"
  - "Monitoring suhu dan kelembaban dengan DHT11"
  - "Monitoring status mesin menggunakan sensor LM393"
  - "Kontrol power mesin melalui SSR"
  - "Pengiriman data menggunakan REST API"
  - "Dashboard berbasis SB Admin 2"
  - "Struktur modular mudah dikembangkan"

# ====================
#  SYSTEM ARCHITECTURE
# ====================
architecture:
  hardware_layer: >
    ESP8266 membaca data dari PZEM-004T, DHT11 dan LM393 kemudian mengemasnya
    menjadi JSON untuk dikirim ke server backend.

  backend_layer: >
    Backend PHP MySQL menyimpan data monitoring, menyediakan API, dan mengirimkan
    instruksi kontrol ke perangkat berdasarkan permintaan dashboard.

  frontend_layer: >
    Dashboard SB Admin 2 menampilkan grafik, tabel log, dan tombol kontrol mesin.
    Data diambil menggunakan AJAX dari backend.

# ====================
#  REPOSITORY STRUCTURE
# ====================
repository_structure:
  IOT-SIMALAS-Monitoring-System:
    BACKEND:
      - config/
      - api/
      - database/
      - handler/
      - index.php
    FRONTEND:
      - startbootstrap-sb-admin-2-gh-pages/
    HARDWARE:
      ESP8266:
        - firmware.ino
      PZEM-004T:
        - wiring.md
      DHT11:
        - dht-library/
      LM393:
        - lm393-guide.md
      SSR:
        - wiring-ssr.md
    others:
      - modal2.ino
      - README.md

# ====================
#  WORKFLOW
# ====================
workflow:
  - "ESP8266 membaca data sensor"
  - "Data dikonversi menjadi JSON"
  - "Data dikirim ke backend via HTTP POST"
  - "Backend menyimpan data ke database"
  - "Dashboard mengambil data secara realtime"
  - "User mengirim instruksi kontrol melalui dashboard"
  - "ESP8266 mengambil instruksi dan mengaktifkan SSR"

# ====================
#  INSTALLATION GUIDE
# ====================
installation:
  backend:
    - "Upload folder BACKEND"
    - "Buat database MySQL dan impor struktur"
    - "Atur konfigurasi database"
  frontend:
    - "Letakkan SB Admin 2 pada direktori publik"
    - "Sesuaikan base URL AJAX"
  hardware:
    - "Flash ESP8266 menggunakan Arduino IDE"
    - "Hubungkan sensor dan SSR"
    - "Pastikan power supply stabil"

# ====================
#  API ENDPOINTS
# ====================
api_endpoints:
  upload_monitoring_data:
    method: "POST"
    fields:
      - voltage
      - current
      - power
      - energy
      - temperature
      - humidity
      - machine_status

  get_control_instruction:
    method: "GET"
    example_response:
      control: "ON"

# ====================
#  TROUBLESHOOTING
# ====================
troubleshooting:
  - "Periksa WiFi ESP8266 jika data tidak terkirim"
  - "Cek wiring TX RX untuk PZEM-004T"
  - "Gunakan delay minimal 1 detik untuk DHT11"
  - "Pastikan SSR menerima trigger HIGH"
  - "Periksa koneksi backend jika dashboard kosong"
