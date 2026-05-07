# MyShop - CRUD Sederhana PHP

Aplikasi CRUD (Create, Read, Update, Delete) sederhana menggunakan PHP, MySQL, dan Bootstrap. Proyek ini sudah dikonfigurasi untuk berjalan di dalam container Docker.

## 🚀 Langkah - Langkah Penggunaan

### 1. Prasyarat
Pastikan Anda sudah menginstal:
- [Docker](https://www.docker.com/products/docker-desktop/)
- [Docker Compose](https://docs.docker.com/compose/install/)

### 2. Menjalankan Aplikasi
Buka terminal di folder proyek ini dan jalankan perintah:
```bash
docker-compose up -d
```
Perintah ini akan mendownload image yang diperlukan dan menjalankan container untuk:
- **PHP + Apache** (Port 8000)
- **MySQL** (Port 3306)
- **PHPMyAdmin** (Port 8080)

### 3. Konfigurasi Database
Setelah container berjalan, Anda perlu membuat tabel `clients`.
1. Buka PHPMyAdmin di browser: [http://localhost:8080](http://localhost:8080)
2. Login dengan:
   - **Username**: `root`
   - **Password**: `rootpassword` (atau sesuai di `docker-compose.yml`)
3. Pilih database `my_database`.
4. Masuk ke tab **SQL** dan jalankan perintah berikut:

```sql
CREATE TABLE clients (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    phone VARCHAR(20) NULL,
    address VARCHAR(200) NULL,
    create_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### 4. Akses Aplikasi
Buka browser dan akses:
- **Aplikasi**: [http://localhost:8000](http://localhost:8000)
- Klik link **Open App** atau langsung ke [http://localhost:8000/app/view/index.php](http://localhost:8000/app/view/index.php)

## 📁 Struktur Folder
- `app/view/`: Berisi halaman utama untuk melihat data.
- `app/process/`: Berisi logika untuk Tambah (Create), Edit (Update), dan Hapus (Delete).
- `docker/`: Konfigurasi environment Docker.

## 🛠️ Fitur
- ✅ List Clients (Read)
- ✅ Add New Client (Create)
- ✅ Edit Client (Update)
- ✅ Delete Client (Delete)
- ✅ Responsive Design dengan Bootstrap 5
