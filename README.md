# Project Laravel 10

## Persyaratan Sistem
Pastikan Anda memiliki prasyarat berikut di sistem Anda sebelum menjalankan proyek Laravel:
1. **PHP**: **8.1**.
2. **Laravel**: **10**.
3. **Database**: MySQL atau lainnya yang didukung Laravel.

## Langkah-Langkah Instalasi
Clone Repository Jalankan perintah berikut untuk meng-clone repository proyek:

```bash
git clone https://github.com/anamayasantii/BackendTest
cd book-laravel
```

### Install Dependency Backend Gunakan Composer untuk menginstal dependency backend:
```bash
composer install
```

### Salin File Konfigurasi .env Salin file .env.example menjadi .env:
```bash
cp .env.example .env
```

### Konfigurasi Environment Buka file .env dan sesuaikan konfigurasi berikut:
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:q/IiaX4Ql5rh1Z5tTUfF9xI//hE79PFX/kgH0xbE3sA=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book-laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Generate Application Key Jalankan perintah berikut untuk membuat application key:
```bash
php artisan key:generate
```

### Migrasi dan Seed Database Jalankan perintah untuk membuat tabel di database:
```bash
php artisan migrate
```

#### (Opsional) Jika ada data awal, gunakan seed:
```bash
php artisan db:seed
```

### Jalankan Server Jalankan server Laravel dengan perintah berikut:
```bash
php artisan serve
```
Akses aplikasi melalui http://localhost:8000.
