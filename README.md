# Music Recommendation App Backend

Ini adalah backend untuk aplikasi rekomendasi musik berbasis ekspresi wajah, dibuat dengan Laravel dan menggunakan JWT untuk autentikasi.

## Prasyarat

Pastikan Anda telah menginstal perangkat berikut:
- [PHP](https://www.php.net/downloads.php) >= 8.0
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/mysql/)
- [Node.js & NPM](https://nodejs.org/)

## Langkah Instalasi

1. **Clone repository ini:**
    ```bash
    git clone https://github.com/ExpressCode-Team/MoodSync-Laravel.git
    cd repo-name
    ```

2. **Install dependensi dengan Composer:**
    ```bash
    composer install
    ```

3. **Buat file `.env`:** 
    Salin file `.env.example` menjadi `.env` dan atur konfigurasi database Anda di file `.env`:
    ```bash
    cp .env.example .env
    ```
    Ubah variabel di file .env untuk menghubungkan aplikasi ke database:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=username_database
    DB_PASSWORD=password_database
    ```

    Kemudian, isi nilai JWT_SECRET di dalam file .env dengan kunci yang telah dibagikan secara terpisah:
    ```
    JWT_SECRET=your-shared-secret-key
    ```

4. **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

5. **Jalankan migrasi dan seeder:**

    Jika database belum ada
    ```bash
    php artisan migrate
    ```

    Jika sudah ada database dan ingin migrasi ulang dan reset data
    ```bash
    php artisan migrate:refresh --seed
    ```

## Catatan Penting

- Jangan lupa untuk menjaga keamanan file .env Anda, terutama dalam lingkungan produksi.
- Untuk dokumentasi lebih lanjut tentang penggunaan Laravel, kunjungi [Laravel Documentation](https://laravel.com/docs/11.x/readme).

