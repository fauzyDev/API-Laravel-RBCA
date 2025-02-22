# REST API Buku dengan RBAC

Dokumentasi untuk REST API manajemen buku menggunakan Laravel 11 dengan Role-Based Access Control (RBAC).

## 📌 Pendahuluan

API ini memungkinkan pengguna untuk mengelola data buku dengan tiga jenis peran:

- **Admin**: Memiliki akses penuh (CRUD).
- **Editor**: Bisa menambahkan dan mengedit buku.
- **Viewer**: Hanya bisa melihat daftar buku.

## 🔑 Autentikasi

API ini menggunakan Laravel Sanctum untuk autentikasi. Setiap permintaan harus menyertakan token autentikasi dalam header.

## Pengujian API
Pengujian API bisa menggunakan postman. 
untuk cara mengujinya jalankan

```sh 
  php artisan serve
```
lalu salin http://127.0.0.1:8000/
paste pada kolom URL di postman
untuk memasukan token nya klik menu Authorization lalu ke Type ganti ke Bearer Token

## Email dan Password untuk Login

**Admin**

**email:** admin@example.com

**password:** admin

**Editor**

**email:** editor@example.com

**password:** editor

**Viewer**

**email:** viewer@example.com

**password:** viewer

### 1. Login

**POST** `/api/login`

#### Request Body:
```json
{
  "email": "admin@example.com",
  "password": "admin"
}
```

#### Response:
```json
{
  "token": "your-access-token"
}
```

Gunakan token ini dalam Authorization Header:
```
Authorization: Bearer "your-access-token"
```

## 📚 Endpoint API

### 1. Mendapatkan Daftar Buku (Viewer, Editor, Admin)

**GET** `/api/books`

#### Response:
```json
{
  "status": 200,
  "message": "Books retrieved successfully",
  "data": [
    {
      "id": "uuid",
      "judul": "Judul Buku",
      "penulis": "Nama Penulis",
      "tahun_terbit": 2024,
      "deskripsi": "Deskripsi buku"
    }
  ]
}
```

### 2. Menambahkan Buku (Editor, Admin)

**POST** `/api/books`

#### Request Body:
```json
{
  "status": 201,
  "message": "Book created successfully",
  "data": [
    {
      "id": "uuid",
      "judul": "Judul Buku",
      "penulis": "Nama Penulis",
      "tahun_terbit": 2024,
      "deskripsi": "Deskripsi buku"
    }
  ]
}
```

### 3. Mengedit Buku (Editor, Admin)

**PUT** `/api/books/{id}`

#### Request Body:
```json
{
  "status": 200,
  "message": "Book updated successfully",
  "data": [
    {
      "id": "uuid",
      "judul": "Judul Buku",
      "penulis": "Nama Penulis",
      "tahun_terbit": 2024,
      "deskripsi": "Deskripsi buku"
    }
  ]
}
```

### 4. Menghapus Buku (Admin)

**DELETE** `/api/books/{id}`

#### Response:
```json
{
  "status": "200",
  "message": "Book deleted successfully"
}
```

## 🎭 Role & Hak Akses

| Role       | GET /books | POST /books | PUT /books/{id} | DELETE /books/{id} |
|------------|------------|-------------|-----------------|--------------------|
| **Admin**  |    ✅      |      ✅    |        ✅      |        ✅          |
| **Editor** |    ✅      |      ✅    |        ✅      |        ❌          |
| **Viewer** |    ✅      |      ❌    |        ❌      |        ❌          |
|            |            |             |                |                     |
## 🛠 Instalasi & Menjalankan API

```sh
git clone https://github.com/fauzyDev/API-Laravel-RBCA.git
cd rbca-api
composer install
cp .env.example .env
php artisan db:seed --class=UserSeeder
php artisan serve
```

## 📝 Lisensi

Proyek ini menggunakan lisensi MIT.

