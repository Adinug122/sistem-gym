# 🏋️‍♂️ IRON GYM

## Sistem Membership Gym & Penjadwalan Terintegrasi Midtrans

**IRON GYM** adalah solusi digital modern untuk manajemen operasional gym. Sistem ini mengotomatisasi pendaftaran member, pembelian paket, pembayaran online via Payment Gateway Midtrans, hingga pengelolaan kuota & jadwal latihan secara real-time.

Cocok untuk **pemilik gym**, **personal trainer**, maupun **developer** yang ingin menggunakan atau menjual ulang sistem manajemen gym berbasis Laravel.

---

## ✨ Fitur Utama (Key Features)

### 💳 Otomasi Pembayaran (Midtrans Gateway)

* **Multi-Payment Support**
  Virtual Account (BCA, Mandiri, BNI, BRI), E-Wallet (GoPay, QRIS, ShopeePay), dan Kartu Kredit.
* **Instant Activation**
  Membership otomatis aktif setelah pembayaran sukses tanpa konfirmasi manual (Webhook Ready).
* **Invoice & Riwayat Transaksi**
  Semua transaksi tercatat rapi dan siap untuk audit.

---

### 📅 Manajemen Kuota & Jadwal Pintar

* **Logic Kuota Otomatis**
  Sistem mengecek ketersediaan slot berdasarkan:
  `jumlah_booking < kuota_maksimal`
* **Status Visual Dinamis**
  🟢 Hijau = Slot tersedia
  🔴 Merah = Slot penuh
* **Booking Guard**
  Hanya member dengan status **Active** yang dapat melakukan booking jadwal.

---

### 📷 Akses Kamera (Identity Capture)

* Pengambilan foto profil atau verifikasi identitas langsung dari browser.
* Mendukung webcam laptop & kamera HP.
* **Catatan:** Membutuhkan koneksi HTTPS.

---

### 🎨 UI/UX Modern

* Dibangun dengan **Tailwind CSS**.
* Responsif (Mobile & Desktop).
* Sidebar dengan **Active Navigation Indicator**.

---

## 🛠️ Teknologi yang Digunakan

| Layer    | Teknologi                |
| -------- | ------------------------ |
| Backend  | Laravel 11/12 (PHP 8.2+) |
| Frontend | Tailwind CSS + Vite      |
| Database | MySQL         |
| Payment  | Midtrans Snap API        |
| HTTPS    | Cloudflare Tunnel        |

---

## 🚀 Panduan Instalasi Lengkap (Local Development)

### 1️⃣ Persiapan File

Ekstrak source code ke folder web server:

```
C:/laragon/www/gym-app
```

---

### 2️⃣ Instalasi Dependency

Masuk ke folder proyek, lalu jalankan:


composer install
npm install

---

### 3️⃣ Konfigurasi Environment (.env)

Rename file:

```
.env.example → .env
```

Lalu sesuaikan konfigurasi berikut:

#### 🔹 Database

```
DB_DATABASE=db_gym
DB_USERNAME=root
DB_PASSWORD=
```

#### 🔹 Midtrans Configuration

Dapatkan **Client Key** & **Server Key** dari Dashboard Midtrans (Sandbox):

```
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxx
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxx
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_SANITIZED=true
MIDTRANS_3DS=true
```

---

### 4️⃣ Generate Key & Database

Jalankan perintah berikut secara berurutan:

```bash
php artisan key:generate
php artisan migrate --seed
```

Seeder akan otomatis membuat:

* Akun Admin

---

### 5️⃣ Build Asset Frontend

```bash
npm run build
```

---

### 6️⃣ Menjalankan Server

```bash
php artisan serve
```

Akses aplikasi di:

```
http://localhost:8000
```

---

## 🔐 HTTPS & Callback Midtrans (WAJIB)

Fitur **Kamera Browser** dan **Webhook Midtrans** membutuhkan HTTPS.

Gunakan Cloudflare Tunnel:

```bash
cloudflared tunnel --protocol http2 --url http://localhost:8000
```

Gunakan URL HTTPS dari Cloudflare sebagai:

* Callback URL Midtrans
* Base URL aplikasi

---

## 👤 Akun Login Default (Testing)

**Admin**

```
Email    : admin@gmail.com
Password : admin123
```

---

## 📦 Isi Paket Penjualan Source Code

📁 Full Source Code Laravel (Clean & Structured)

📁 Konfigurasi Midtrans (Snap + Webhook)

📁 Database Migration & Seeder

📜 Dokumentasi Instalasi (README.md)

🖼️ Folder Screenshot UI

---

## 📌 Catatan Penting

* Gunakan **Midtrans Sandbox** untuk testing.
* Jangan lupa ubah `MIDTRANS_IS_PRODUCTION=true` saat live.
* Sistem siap dikembangkan untuk:

  * Multi Cabang Gym
  * Membership Personal Trainer
  * Absensi QR / Face Capture

---

🚀 **IRON GYM** – Solusi Gym Modern, Otomatis, & Siap Produksi
