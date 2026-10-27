# Sistem Informasi Perpustakaan Sederhana

## Deskripsi Project

Sistem Informasi Perpustakaan Sederhana merupakan aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk membantu proses pengelolaan data perpustakaan. Project ini dibuat sebagai tugas akhir mata kuliah dengan menerapkan konsep pengembangan aplikasi web menggunakan framework Laravel.

Aplikasi ini dirancang untuk membantu admin dan petugas dalam mengelola data buku, kategori, anggota, pengguna, serta transaksi peminjaman dan pengembalian buku.

## Tujuan

Tujuan pengembangan project ini adalah:
- Memahami struktur project Laravel.
- Menerapkan konsep Model-View-Controller (MVC).
- Menghubungkan aplikasi dengan database MySQL.
- Memahami penggunaan Git dan GitHub untuk pengelolaan source code.
- Mengembangkan aplikasi perpustakaan secara bertahap sesuai checkpoint perkuliahan.

## Teknologi yang Digunakan

- **Bahasa Pemrograman:** PHP
- **Framework:** Laravel 12
- **Database:** MySQL
- **Web Server Lokal:** XAMPP
- **Dependency Manager:** Composer
- **Code Editor:** Visual Studio Code
- **Version Control:** Git
- **Repository:** GitHub

## Fitur Sistem

Fitur yang direncanakan dalam pengembangan aplikasi meliputi:

1. Authentication (login dan logout).
2. Pengelolaan pengguna dan role.
3. Pengelolaan kategori buku.
4. Pengelolaan data buku.
5. Pengelolaan data anggota perpustakaan.
6. Transaksi peminjaman dan pengembalian buku.
7. Dashboard informasi perpustakaan.

Fitur-fitur tersebut akan dikembangkan secara bertahap sesuai dengan checkpoint tugas akhir.

## Persyaratan Sistem

Sebelum menjalankan project, pastikan perangkat sudah memiliki:
- PHP 8.2 atau versi yang kompatibel dengan Laravel 12.
- Composer.
- MySQL atau MariaDB.
- Git.
- Web browser.

## Instalasi dan Menjalankan Project

### 1. Clone Repository

Unduh source code dari repository GitHub: https://github.com/muhihsan1585-lab/Sistem-Informasi-Perpustakaan-Sederhana.git

```bash
git clone URL_REPOSITORY_KAMU
```

Masuk ke folder project:

```bash
cd Sistem-Informasi-Perpustakaan-Sederhana
```

### 2. Instal Dependency

Jalankan perintah berikut untuk memasang dependency Laravel:

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
copy .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

### 4. Konfigurasi Database

Buat database baru melalui phpMyAdmin atau MySQL dengan nama:

`library_system`

Sesuaikan konfigurasi database pada file `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_system
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL pada perangkat masing-masing.

### 5. Menjalankan Aplikasi

Jalankan server pengembangan Laravel:

```bash
php artisan serve
```

Buka browser dan akses:

`http://127.0.0.1:8000`

## Struktur Project

Beberapa folder dan file utama yang digunakan:

- `app/` — menyimpan model dan controller aplikasi.
- `bootstrap/` — konfigurasi awal aplikasi Laravel.
- `config/` — menyimpan konfigurasi aplikasi.
- `database/` — menyimpan migration dan seeder.
- `resources/views/` — menyimpan tampilan aplikasi.
- `routes/web.php` — mendefinisikan route web.
- `public/` — menyimpan file publik aplikasi.
- `.env` — konfigurasi lingkungan aplikasi.
- `README.md` — dokumentasi project.

## Identitas Kelompok

- Nama Project: Sistem Informasi Perpustakaan Sederhana
- Nama Anggota 1: [BIBIT ARYO UTOMO]
- NIM: [NIM]
- Nama Anggota 2: [MUHAMMAD IHSAN]
- NIM: [2410631250018]
- Nama Anggota 3: [ROSHAN ALVARO PUTRA GUNAWAN]
- NIM: [NIM]

## Repository GitHub

Link Repository: https://github.com/muhihsan1585-lab/Sistem-Informasi-Perpustakaan-Sederhana.git

## Author

Dikembangkan oleh mahasiswa sebagai bagian dari tugas akhir mata kuliah pengembangan aplikasi web menggunakan Laravel.
- Nama Anggota 1: [BIBIT ARYO UTOMO]
- Nama Anggota 2: [MUHAMMAD IHSAN]
- Nama Anggota 3: [ROSHAN ALVARO PUTRA GUNAWAN]