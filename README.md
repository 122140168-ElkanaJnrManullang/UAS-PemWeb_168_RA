# UAS-PemWeb_168_RA

Ujian Akhir Semester – Mata Kuliah Pemrograman Web - RA

# Panduan Hosting Aplikasi Web di 000WebHost

## 1. Langkah-langkah untuk Meng-host Aplikasi Web

Untuk meng-host aplikasi web saya, saya mengikuti langkah-langkah berikut:

1. **Persiapkan Aplikasi Web:**

   - Pastikan semua file aplikasi web (HTML, PHP, CSS, JavaScript) sudah siap dan bekerja dengan baik di lingkungan lokal.
   - Lakukan pengujian di server lokal (misalnya menggunakan XAMPP atau WAMP) untuk memastikan aplikasi berfungsi sebagaimana mestinya.

2. **Daftar dan Login ke 000WebHost:**

   - Kunjungi situs web 000WebHost di [www.000webhost.com](https://www.000webhost.com).
   - Daftar akun baru atau login jika sudah memiliki akun.

3. **Buat Website Baru:**

   - Setelah login, pilih opsi untuk membuat website baru.
   - Pilih subdomain atau gunakan domain pribadi jika sudah memilikinya.
   - Pilih PHP dan MySQL (jika menggunakan database) untuk mendukung aplikasi web.

4. **Unggah File Aplikasi:**

   - Gunakan file manager yang disediakan oleh 000WebHost atau FTP (FileZilla) untuk mengunggah file aplikasi web ke server.
   - Pastikan file diunggah ke folder root website (biasanya `public_html`).

5. **Konfigurasi Database (Jika Diperlukan):**

   - Jika aplikasi menggunakan database, buat database baru di panel kontrol 000WebHost.
   - Impor file database (misalnya file `.sql`) jika sudah ada, atau buat tabel sesuai kebutuhan aplikasi.

6. **Uji Aplikasi di Server:**
   - Setelah semua file dan konfigurasi selesai, buka aplikasi di browser dengan menggunakan alamat yang diberikan oleh 000WebHost.
   - Periksa apakah aplikasi berjalan dengan lancar di server.

## 2. Penyedia Hosting Web yang Paling Cocok

Saya memilih **000WebHost** sebagai penyedia hosting untuk aplikasi web saya karena alasan berikut:

- **Gratis dan Mudah Digunakan:** 000WebHost menawarkan paket hosting gratis dengan fitur yang cukup lengkap, cocok untuk aplikasi web dengan kebutuhan dasar.
- **Dukungan PHP dan MySQL:** 000WebHost mendukung PHP dan MySQL, yang diperlukan untuk aplikasi web saya.
- **Antarmuka Pengguna yang Sederhana:** 000WebHost memiliki antarmuka yang mudah digunakan, memudahkan saya dalam mengelola file dan database aplikasi web.
- **Keandalan dan Kecepatan:** Meskipun gratis, 000WebHost cukup andal dalam hal kecepatan dan uptime.

## 3. Menjamin Keamanan Aplikasi Web

Untuk memastikan keamanan aplikasi web yang saya host, saya menerapkan beberapa langkah berikut:

- **Menggunakan HTTPS:** Saya memastikan situs web diakses melalui HTTPS untuk melindungi data yang ditransfer antara pengguna dan server.
- **Penggunaan Password yang Kuat:** Untuk akses ke panel kontrol 000WebHost dan database, saya menggunakan kata sandi yang kuat dan unik.
- **Melakukan Pembaruan Secara Rutin:** Saya memastikan bahwa semua software dan framework yang digunakan selalu diperbarui untuk menutupi kerentanannya.
- **Backup Rutin:** Saya melakukan backup secara rutin terhadap file dan database aplikasi untuk mencegah kehilangan data.
- **Menjaga Keamanan Database:** Saya memastikan bahwa akses ke database hanya diberikan kepada pengguna yang berwenang, serta menggunakan query yang aman untuk mencegah serangan SQL injection.

## 4. Konfigurasi Server yang Diterapkan

Untuk mendukung aplikasi web saya, saya menerapkan beberapa konfigurasi server berikut:

- **Pengaturan PHP:** Mengaktifkan versi PHP terbaru yang kompatibel dengan aplikasi web saya di panel kontrol 000WebHost.
- **Konfigurasi Database:** Saya mengonfigurasi database MySQL untuk aplikasi web saya dengan membuat tabel dan hubungan yang sesuai, serta memastikan hanya pengguna yang berwenang yang memiliki akses.
- **Pengaturan File Permissions:** Saya mengatur izin file dan folder dengan hati-hati untuk membatasi akses tidak sah.
- **Error Logging:** Saya mengaktifkan error logging untuk membantu mendeteksi dan mengatasi masalah yang mungkin terjadi pada aplikasi web.
- **CORS (Cross-Origin Resource Sharing):** Saya mengonfigurasi CORS untuk memastikan bahwa aplikasi web hanya dapat diakses dari domain yang sah.

Dengan mengikuti langkah-langkah ini, saya dapat meng-host aplikasi web dengan aman dan memastikan kinerja yang optimal di server 000WebHost.
