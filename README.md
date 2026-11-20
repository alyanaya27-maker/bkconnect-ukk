# BKConnect – Sistem Informasi Bimbingan dan Konseling

<p align="center">
  <strong>Aplikasi Pengelolaan Bimbingan dan Konseling Berbasis Web</strong>
</p>

## Tentang BKConnect

BKConnect merupakan aplikasi berbasis web yang dikembangkan untuk membantu proses pengelolaan layanan Bimbingan dan Konseling (BK) di lingkungan sekolah.

Aplikasi ini dirancang untuk mempermudah siswa dalam mengajukan konseling serta membantu Guru BK dalam mengelola data siswa, pengajuan konseling, jadwal konseling, dan riwayat konseling.

## Tujuan Aplikasi

1. Mempermudah siswa dalam mengakses layanan konseling.
2. Membantu Guru BK mengelola layanan bimbingan dan konseling.
3. Mempermudah pengelolaan jadwal konseling.
4. Menyediakan pencatatan riwayat konseling.
5. Membantu pengelolaan data pengguna secara terstruktur.

## Fitur Utama

- Registrasi dan login pengguna.
- Dashboard berdasarkan hak akses pengguna.
- Pengelolaan data siswa.
- Pengelolaan data Guru BK.
- Pengelolaan data Wali Kelas.
- Pengajuan konseling.
- Pengelolaan jadwal konseling.
- Riwayat konseling.
- Pengaturan sistem oleh admin.

## Hak Akses Pengguna

| Pengguna | Hak Akses |
|---|---|
| Siswa | Mengajukan konseling, melihat jadwal, dan riwayat sendiri |
| Guru BK | Mengelola data siswa dan layanan konseling |
| Wali Kelas | Mengakses fitur sesuai hak akses |
| Admin | Mengelola pengguna dan pengaturan sistem |

## Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| Laravel | Framework backend |
| PHP | Bahasa pemrograman |
| MySQL | Database |
| HTML | Struktur halaman |
| CSS | Desain tampilan |
| JavaScript | Interaksi halaman |
| Laragon | Server lokal |
| Visual Studio Code | Code editor |

## Persyaratan Sistem

- PHP 8.3 atau versi yang sesuai dengan konfigurasi proyek.
- Composer.
- MySQL.
- Laragon atau web server lainnya.
- Visual Studio Code.
- Browser.

## Instalasi dan Menjalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/alyanaya27-maker/bkconnect.git
```

### 2. Masuk ke Folder Proyek

```bash
cd bkconnect
```

### 3. Instal Dependency

```bash
composer install
```

### 4. Buat File Konfigurasi

Windows:

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Buat database MySQL dengan nama:

```text
bkconnect
```

Kemudian sesuaikan konfigurasi database pada file `.env`.

### 7. Jalankan Migration

```bash
php artisan migrate
```

### 8. Jalankan Aplikasi

```bash
php artisan serve
```

Buka browser melalui alamat:

```text
http://127.0.0.1:8000
```

## Struktur Folder Laravel

```text
bkconnect/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   └── migrations/
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── .env.example
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

## Keamanan Aplikasi

BKConnect menggunakan autentikasi pengguna dan pembatasan hak akses berdasarkan role. Password pengguna diproses menggunakan mekanisme hashing Laravel.

File konfigurasi `.env` tidak boleh dibagikan ke repository publik karena dapat berisi informasi sensitif.

## Status Pengembangan

BKConnect saat ini berada pada tahap pengembangan dan pengujian menggunakan lingkungan lokal (localhost) dengan Laragon.

Deployment ke server online merupakan tahap pengembangan selanjutnya.

## Informasi Proyek

- **Nama Proyek:** BKConnect
- **Kategori:** Sistem Informasi Bimbingan dan Konseling
- **Platform:** Web Application
- **Framework:** Laravel
- **Database:** MySQL
- **Repository:** https://github.com/alyanaya27-maker/bkconnect

## Lisensi

Proyek ini dikembangkan untuk keperluan pembelajaran dan proyek UKK/RPL.