🔍 Analisis Algoritma Searching & Sorting (Interaktif via Web)
================================================================

Aplikasi ini adalah aplikasi web interaktif untuk menampilkan visualisasi berbagai algoritma pencarian (Searching) dan pengurutan (Sorting) seperti Linear Search, Binary Search, Bubble Sort, Selection Sort, Insertion Sort, dan Quick Sort. Aplikasi dikemas dalam container Docker menggunakan Nginx agar mudah dijalankan melalui web browser.

----------------------------------------------------------------
🎯 Fitur Utama
----------------------------------------------------------------
- Visualisasi langkah demi langkah proses algoritma
- Statistik jumlah perbandingan dan pertukaran
- Perbandingan performa semua algoritma
- UI modern dan responsif

----------------------------------------------------------------
📁 Struktur File
----------------------------------------------------------------
algoritma-analyzer/
├── index.html       -> Halaman web utama
├── Dockerfile       -> Instruksi untuk build Docker image
├── nginx.conf       -> Konfigurasi Nginx
└── README.txt       -> Dokumentasi ini

----------------------------------------------------------------
🚀 Cara Menjalankan (Lokal via Docker)
----------------------------------------------------------------
1. Buka terminal dan masuk ke folder `algoritma-analyzer`

2. Build Docker image:
   docker build -t algoritma-analyzer .

3. Jalankan container:
   docker run -d -p 8080:80 --name analyzer-web algoritma-analyzer

4. Akses di browser:
   http://localhost:8080
   (Atau http://<IP-server>:8080 jika diakses dari jaringan lain)

----------------------------------------------------------------
🛑 Menghentikan Container
----------------------------------------------------------------
docker stop analyzer-web
docker rm analyzer-web

----------------------------------------------------------------
🧠 Kebutuhan Sistem
----------------------------------------------------------------
- Docker sudah terinstall
- Browser modern (Chrome, Firefox, Edge, dsb.)

----------------------------------------------------------------
👨‍💻 Pembuat
----------------------------------------------------------------
Nama: Muhammad Afatyo Ikhsan  
NIM : 24011110157  
Prodi: Teknik Informatika  
Universitas Bani Saleh


