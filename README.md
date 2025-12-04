# Janji
Saya Naufal Zahid dengan NIM 2405787 mengerjakan Evaluasi Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## 🔗 Informasi Repositori

| Kategori | Detail |
| :--- | :--- |
| **Nama Repo** | `TP10DPBO2425C2` |
| **Database** | `magic_rpg` (4 tabel: guilds, wizards, grimoires, potions) |
| **Arsitektur** | Model-View-ViewModel (MVVM) |
| **Tema** | RPG / Wizard Management System |

---

## 🧙‍♂️ Tema Website: Arcane Chronicles

Website ini digunakan sebagai sistem manajemen database (DBMS) untuk dunia RPG fantasi.

**Fitur Penggunaan:**
- **Guilds (Induk):** Mengelola organisasi/asrama penyihir.
- **Wizards (Anak):** Mengelola karakter penyihir yang tergabung dalam Guild.
- **Grimoires (Cucu):** Mengelola buku sihir yang dimiliki oleh spesifik Wizard.
- **Potions (Bebas):** Mengelola item konsumsi yang dijual di toko.

---

## 🗃️ Struktur Database

<img width="711" height="517" alt="image" src="https://github.com/user-attachments/assets/16773afd-c75f-4403-b008-82237a3fdd2a" />

Sistem ini menggunakan 4 tabel dengan relasi Foreign Key (FK) yang saling terhubung.

### 1️⃣ Tabel `guilds` (Parent)
Organisasi tempat penyihir bernaung.
| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id` | INT (PK) | ID Unik Guild |
| `nama_guild` | VARCHAR | Nama Organisasi |
| `base_region` | VARCHAR | Lokasi Markas |
| `deskripsi` | TEXT | Keterangan Guild |

### 2️⃣ Tabel `wizards` (Child)
Karakter penyihir (Berelasi dengan Guild).
| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id` | INT (PK) | ID Unik Wizard |
| `nama_wizard` | VARCHAR | Nama Karakter |
| `elemen` | VARCHAR | Tipe Elemen Sihir |
| `level` | INT | Level Kekuatan |
| `id_guild` | INT (FK) | Relasi ke tabel `guilds` |

### 3️⃣ Tabel `grimoires` (Grandchild)
Senjata/Buku sihir (Berelasi dengan Wizard).
| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id` | INT (PK) | ID Unik Grimoire |
| `nama_buku` | VARCHAR | Nama Item |
| `magic_power` | INT | Kekuatan Sihir (Angka) |
| `id_wizard` | INT (FK) | Relasi ke tabel `wizards` |

### 4️⃣ Tabel `potions` (Standalone)
Item tambahan tanpa relasi.
| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id` | INT (PK) | ID Unik Potion |
| `nama_potion` | VARCHAR | Nama Ramuan |
| `efek` | VARCHAR | Efek Item |
| `harga` | INT | Harga Item (Gold) |

---

## 🧩 Fitur Utama

Setiap entitas memiliki fitur **CRUD** lengkap:

| Fitur | Deskripsi |
| :--- | :--- |
| **Create** | Menambahkan data baru (Guild, Wizard, Grimoire, Potion). |
| **Read** | Menampilkan daftar data dengan penomoran otomatis & Join Table. |
| **Update** | Mengedit data yang sudah ada (Form *pre-filled* data lama). |
| **Delete** | Menghapus data (Cascade delete berlaku untuk relasi). |
| **Styling** | Menggunakan CSS **Dark Mode** bertema Magic RPG. |

---

## 🏗️ Struktur Folder Proyek (MVVM)

Struktur folder dirancang untuk memisahkan *concern* sesuai pola MVVM.

```bash
TP11/
 ├── project/
 │    ├── config/
 │    │    └── Database.php         # Koneksi Database (PDO)
 │    │
 │    ├── models/                   # [MODEL] Struktur Data & Query
 │    │    ├── Guild.php
 │    │    ├── Wizard.php
 │    │    ├── Grimoire.php
 │    │    └── Potion.php
 │    │
 │    ├── viewmodels/               # [VIEWMODEL] Logika Bisnis & Mediator
 │    │    ├── GuildViewModel.php
 │    │    ├── WizardViewModel.php
 │    │    ├── GrimoireViewModel.php
 │    │    └── PotionViewModel.php
 │    │
 │    ├── views/                    # [VIEW] Antarmuka Pengguna (UI)
 │    │    ├── guild_list.php       # Tampilan Tabel
 │    │    ├── guild_form.php       # Tampilan Form (Add/Edit)
 │    │    ├── ... (file view wizard, grimoire, potion lainnya)
 │    │    └── ...
 │    │
 │    ├── style.css                 # Styling Global (Dark Theme)
 │    └── index.php                 # Halaman Dashboard Utama
 │
 ├── magic_rpg.sql                  # File Import SQL
 ├── dokumentasi/                   # Bukti Screen Record
 └── README.md                      # Dokumentasi Proyek
```
---

## 🔄 Alur Program (MVVM Flow)
1. View (UI): Pengguna berinteraksi dengan halaman web (misal: klik tombol "Simpan"). View mengirimkan input ke ViewModel.

2. ViewModel: Menerima input, memproses logika bisnis, dan memanggil method yang sesuai di Model.

3. Model: Melakukan operasi database (CRUD) dan mengembalikan hasilnya ke ViewModel.

4. ViewModel: Memperbarui state/data yang dimilikinya.

5. View: Secara otomatis menampilkan data terbaru yang diambil dari ViewModel (Data Binding).

---

## 💻 Cara Menjalankan
1. Nyalakan XAMPP (Apache & MySQL).
2. Buka `localhost/phpmyadmin`.
3. Buat database baru dengan nama `magic_rpg`.
4. Import file `project/database/magic_rpg.sql` ke dalam database tersebut.
5. Pastikan konfigurasi di `project/config/Database.php` sesuai dengan user/pass MySQL Anda.
6. Akses aplikasi di browser:
   ```bash
   http://localhost/project/index.php
   ```
---

## 🎥 Dokumentasi

https://github.com/user-attachments/assets/d17d0a23-1a5f-4abc-b532-f57e1e75228c

### Delete Grimoire
https://github.com/user-attachments/assets/70ec2bae-8afe-4d9b-a4c4-b505fb809d1a

