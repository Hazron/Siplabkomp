# SIPLabKomp

SIPLabKomp (Sistem Informasi Peminjaman Laboratorium Komputer) adalah sebuah aplikasi web yang dirancang untuk memudahkan peminjaman ruang laboratorium komputer di Fakultas Sains dan Teknologi, Universitas Jambi.

## Deskripsi

SIPLabKomp adalah sistem informasi yang bertujuan untuk mengelola dan mempermudah proses peminjaman ruang laboratorium komputer bagi mahasiswa ketua kelas Fakultas Sains dan Teknologi, Universitas Jambi. Dengan sistem ini, pengguna dapat melihat jadwal ketersediaan lab, mengajukan peminjaman.

## Instalasi

1. **Clone Repository**

    ```bash
    git clone https://github.com/username/siplabkomp.git
    cd siplabkomp
    ```

    ```

    ```

2. **Instalasi Depedensi**
   composer install
   npm install
   npm run dev

```

```

3. **Konfigurasi Environment**
   Salin file .env.example menjadi .env dan sesuaikan konfigurasi database dan lainnya:
   cp .env.example .env
   php artisan key:generate

4. **\*Migration & Seed Database**
   php artisan migrate --seed

5. **Jalankan Server**
   php artisan serve
