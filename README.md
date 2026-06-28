# Lab11Web — Pemrograman Web 2
**Nama:** Vivit Nurul Hidayah  
**NIM:** 312410110  
**Mata Kuliah:** Pemrograman Web 2  
**Universitas:** Universitas Pelita Bangsa  

---

## Daftar Praktikum

| No | Topik | Teknologi |
|----|-------|-----------|
| 1  | Instalasi CodeIgniter 4 & Routing Dasar | CodeIgniter 4, PHP |
| 2  | Controller, View, dan Routing Lanjut | CodeIgniter 4 |
| 3  | Model dan Database | CodeIgniter 4, MySQL |
| 4  | Autentikasi & Session (Login Admin) | CodeIgniter 4, Filter |
| 5  | CRUD Artikel | CodeIgniter 4, MySQL |
| 6  | Upload Gambar & Pagination | CodeIgniter 4 |
| 7  | RESTful API dengan CI4 | CodeIgniter 4, REST API |
| 8  | AJAX & Fetch API | JavaScript, Axios |
| 9  | Pengenalan VueJS | VueJS 3 |
| 10 | Komponen & Props VueJS | VueJS 3 |
| 11 | Vue Router & SPA | VueJS 3, Vue Router |
| 12 | Integrasi REST API dengan VueJS (SPA) | VueJS 3, Axios, CI4 |
| 13 | Autentikasi & Navigation Guards (SPA Security) | VueJS 3, Vue Router, CI4 |
| 14 | Keamanan API, Token Authentication & Axios Interceptors | VueJS 3, Axios, CI4 |

---

## Praktikum 1 – Pengenalan CodeIgniter 4
Pada praktikum pertama ini, fokus utamanya adalah memahami dasar penggunaan framework CodeIgniter 4 serta konsep MVC yang digunakan.

<img width="657" height="671" alt="image" src="https://github.com/user-attachments/assets/2a6b18fc-b2fa-45e2-881e-c929f847ff67" />
<img width="673" height="648" alt="image" src="https://github.com/user-attachments/assets/0e95017e-9afa-4e6d-9131-ddcc7fc1018b" />
<img width="730" height="352" alt="image" src="https://github.com/user-attachments/assets/4756ef28-388c-4403-b918-8f08b5591f39" />
<img width="775" height="728" alt="image" src="https://github.com/user-attachments/assets/dfbd41c1-b4c2-4735-bf95-da6ed73a3062" />
<img width="881" height="673" alt="image" src="https://github.com/user-attachments/assets/191eb37f-5c58-4faa-a4ab-845c8f761dba" />
<img width="855" height="664" alt="image" src="https://github.com/user-attachments/assets/3905e753-1f3d-4c25-bdb9-82acf7266bbe" />
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/810ccf9c-1b6e-4dba-97ac-98d2a6ec6395" />


- Persiapan dan Konfigurasi
Sebelum memulai, perlu dilakukan pengaturan pada web server agar CI4 bisa berjalan dengan baik. Beberapa ekstensi PHP seperti JSON, MySQLi, XML, dan Intl harus diaktifkan melalui file php.ini di XAMPP. Setelah itu, Apache perlu direstart agar perubahan diterapkan.

- Instalasi CodeIgniter 4
Framework diinstal secara manual dengan cara mengunduh dari website resmi, lalu mengekstraknya ke dalam folder htdocs. Folder hasil ekstrak kemudian diubah namanya menjadi ci4 agar lebih mudah diakses melalui browser menggunakan path /public.

- Penggunaan CLI (Command Line Interface)
CodeIgniter menyediakan tool bernama Spark untuk membantu proses development. Tool ini dijalankan melalui terminal dengan perintah php spark, yang berfungsi untuk menjalankan server, melihat route, dan berbagai perintah lainnya.

- Mode Debugging
Secara default, error pada CI4 tidak ditampilkan secara detail. Oleh karena itu, file env perlu diubah menjadi .env, lalu nilai CI_ENVIRONMENT diganti menjadi development agar error dapat terlihat dengan jelas saat terjadi kesalahan.

- Struktur Folder & Konsep MVC
Framework ini menggunakan konsep MVC:
Model: mengelola data dan database
View: menangani tampilan (UI)
Controller: mengatur alur logika aplikasi
Fokus utama pengembangan berada di folder app, sedangkan file publik seperti CSS disimpan di folder public.

- Routing dan Controller
Routing berfungsi untuk mengatur URL agar terhubung ke controller tertentu. Konfigurasi dilakukan di file Routes.php. Contohnya, URL /about bisa diarahkan ke method about() dalam controller Page.

- Pembuatan Layout
Untuk membuat tampilan lebih rapi dan konsisten, digunakan template seperti header dan footer. File CSS disimpan di folder public, lalu dipanggil melalui view menggunakan base_url().

## Praktikum 2 – CRUD Database
Pada praktikum ini mulai masuk ke pengolahan data menggunakan database MySQL.

<img width="775" height="728" alt="image" src="https://github.com/user-attachments/assets/20ee9c0e-4211-41cb-8e5d-34e80f4f27df" />
<img width="855" height="664" alt="image" src="https://github.com/user-attachments/assets/3ada6f0b-a313-48ff-96e9-c38eb1eb5890" />
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/41ac7aa5-d120-44b2-b465-a382309403c9" />

- Pembuatan Database
Langkah awal adalah membuat database dan tabel artikel yang berisi beberapa field seperti judul, isi, gambar, dan lainnya. Selanjutnya, koneksi database diatur melalui file .env.

- Model
Model dibuat untuk mengelola data dari tabel. Di dalamnya ditentukan nama tabel, primary key, serta field yang boleh diisi.

- Menampilkan Data (Read)
Controller mengambil data dari model menggunakan fungsi seperti findAll(), lalu dikirim ke view untuk ditampilkan dalam bentuk daftar.

- Detail Artikel
Fitur ini memungkinkan user melihat isi artikel secara lengkap. Data diambil berdasarkan slug, sehingga URL menjadi lebih rapi dan SEO-friendly.

- CRUD (Create, Update, Delete)
Create: menambahkan data baru melalui form
Update: mengubah data yang sudah ada
Delete: menghapus data tertentu
Admin Page: menampilkan daftar data dengan tombol aksi

## Praktikum 3 – Layout dan View Cell

Praktikum ini fokus pada pengelolaan tampilan agar lebih modular dan reusable.
<img width="1919" height="949" alt="image" src="https://github.com/user-attachments/assets/9aa2be8b-dc77-4db7-a0f5-a345a2bb1bf2" />
<img width="1919" height="945" alt="image" src="https://github.com/user-attachments/assets/3cfae0f5-a71e-42cd-bebe-b20e5312481b" />
<img width="1918" height="945" alt="image" src="https://github.com/user-attachments/assets/191ae9a7-95bc-4cd9-831a-e6cc3792e3b9" />
<img width="1919" height="946" alt="image" src="https://github.com/user-attachments/assets/ecaf59fb-fb08-4c53-9976-cac02a7f63f2" />
<img width="1919" height="956" alt="image" src="https://github.com/user-attachments/assets/3ff18a41-42bb-4b85-a98b-34c24f8b979f" />
<img width="1915" height="951" alt="image" src="https://github.com/user-attachments/assets/a40a8ffc-ddc3-419e-b920-2d81394d8288" />

- View Layout
Layout digunakan sebagai template utama yang berisi struktur dasar HTML. Halaman lain cukup mengisi bagian tertentu saja menggunakan konsep section, sehingga tidak perlu menulis ulang kode yang sama.

- View Cell
View Cell digunakan untuk membuat komponen kecil yang bisa digunakan berulang, seperti sidebar atau daftar artikel terbaru. Komponen ini memiliki logic sendiri dan bisa dipanggil langsung dari layout.

## Praktikum 4 – Login dan Authentication
Pada tahap ini, aplikasi mulai dilengkapi dengan sistem login.

<img width="1365" height="678" alt="image" src="https://github.com/user-attachments/assets/ff47f47e-3a6a-4918-9360-c07894b536ae" />


- Tabel User
Database dibuat dengan tabel user yang menyimpan data seperti username, email, dan password.

- Model User
Model digunakan untuk menghubungkan aplikasi dengan tabel user, serta mengatur field yang digunakan.

- Controller Login
Controller menangani proses login dan logout. Data dari form akan dicek ke database, dan jika sesuai, akan disimpan dalam session.

- View Login
Halaman login berisi form input email dan password. Jika terjadi kesalahan, akan ditampilkan pesan menggunakan flashdata.

- Seeder
Seeder digunakan untuk menambahkan data dummy ke database melalui CLI, sehingga tidak perlu input manual.

- Filter Authentication
Filter berfungsi untuk membatasi akses ke halaman tertentu. Jika user belum login, maka otomatis akan diarahkan ke halaman login.

### Praktikum 5 — CRUD Artikel

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/37112167-f160-4c50-9605-648b74f03734" />
<img width="1365" height="676" alt="image" src="https://github.com/user-attachments/assets/5fd12fa5-eb96-464b-b423-e650709d66fe" />


Implementasi fitur Create, Read, Update, Delete (CRUD) untuk data artikel pada panel admin. Menggunakan Form POST dan redirect setelah operasi berhasil. Hasil: admin dapat menambah, mengedit, dan menghapus artikel melalui antarmuka web.

### Praktikum 6 — Upload Gambar & Pagination
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/0cc294d8-e61b-4e00-a8ed-42852ffaa96d" />
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/cd4df616-9f58-45c6-b912-164f543905b3" />

Menambahkan fitur upload gambar pada form artikel menggunakan library `UploadedFile` CI4. Menerapkan paginasi data pada halaman daftar artikel. Hasil: artikel dapat dilengkapi gambar dan daftar artikel tampil per halaman.

### Praktikum 7 — RESTful API dengan CI4

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/2f8983e9-2c1e-4e37-be5b-ea1b6bfdac7c" />

Membuat endpoint RESTful API menggunakan `ResourceController` CI4. Mendefinisikan route resource untuk operasi GET, POST, PUT, DELETE pada data artikel (`/post`). Hasil: API dapat dikonsumsi oleh client eksternal seperti Postman.

### Praktikum 8 — AJAX & Fetch API
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/092468ee-0ec0-4aef-8579-deece1f8d5e2" />

Mengimplementasikan AJAX pada halaman admin artikel menggunakan JavaScript dan Axios. Data artikel dimuat secara asinkron tanpa reload halaman. Menambahkan fitur pencarian, filter kategori, dan sorting berbasis AJAX. Hasil: halaman admin artikel lebih responsif dan interaktif.

### Praktikum 9 — Pengenalan VueJS
<img width="1365" height="682" alt="image" src="https://github.com/user-attachments/assets/6981a573-74c8-4c8e-9e25-a6643f2d2c1d" />

Pengenalan framework JavaScript VueJS 3. Mempelajari konsep reaktivitas, data binding (`v-model`, `v-bind`), direktif (`v-if`, `v-for`), dan event handling (`@click`). Hasil: halaman sederhana interaktif menggunakan VueJS tanpa build tool (CDN).

### Praktikum 10 — Komponen & Props VueJS
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/b0255901-3208-4260-ad07-db58c9a6db06" />

Mempelajari konsep komponen pada VueJS 3. Membuat komponen terpisah dan mengirim data antar komponen menggunakan Props. Hasil: aplikasi VueJS terdiri dari komponen-komponen yang dapat digunakan ulang.

### Praktikum 11 — Vue Router & SPA
<img width="1365" height="686" alt="image" src="https://github.com/user-attachments/assets/ab50aad5-0297-4a7d-8b4e-b86f42fe05da" />
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/51b3660a-2661-4d67-b8b6-27dc726ac398" />

Mengimplementasikan Vue Router untuk membangun Single Page Application (SPA). Mendefinisikan rute (`/`, `/artikel`, `/about`) yang dipetakan ke komponen berbeda tanpa reload halaman. Hasil: navigasi antar halaman berjalan mulus sebagai SPA.

### Praktikum 12 — Integrasi REST API dengan VueJS
<img width="1365" height="675" alt="image" src="https://github.com/user-attachments/assets/8dd89b6e-4c27-46a5-929f-e7f82e1d1f07" />
<img width="1365" height="289" alt="image" src="https://github.com/user-attachments/assets/d6acdfe3-16f5-4893-9c0c-f03e3c6c0bfc" />

Menghubungkan frontend VueJS SPA dengan backend REST API CodeIgniter 4 menggunakan Axios. Komponen `Artikel.js` menampilkan, menambah, mengedit, dan menghapus data artikel secara real-time melalui API. Hasil: aplikasi SPA terintegrasi penuh dengan backend CI4.

### Praktikum 13 — Autentikasi & Navigation Guards
<img width="1365" height="672" alt="image" src="https://github.com/user-attachments/assets/8820103b-6b00-432b-b003-c7c8dfc04178" />

Membuat sistem autentikasi berbasis token sederhana pada SPA. Sisi backend: endpoint `POST /api/login` pada CI4 memvalidasi kredensial dan mengembalikan token. Sisi frontend: Navigation Guards (`router.beforeEach`) mencegah akses ke halaman terproteksi (`/artikel`, `/about`) bagi pengguna yang belum login. Token dan status login disimpan di `localStorage` browser. Hasil: halaman terlindungi hanya bisa diakses setelah login berhasil.

### Praktikum 14 — Keamanan API, Token Authentication & Axios Interceptors
<img width="1366" height="768" alt="Screenshot 2026-06-28 133713" src="https://github.com/user-attachments/assets/145a90c2-ea8b-4645-a436-ce17519d6faa" />

Menambahkan lapisan keamanan di sisi server menggunakan CI4 Filter (`ApiAuthFilter`). Filter memeriksa keberadaan token pada HTTP Header `Authorization: Bearer <token>` setiap request masuk ke endpoint sensitif (POST/PUT/DELETE). Sisi frontend: Axios Interceptors dikonfigurasi untuk menyuntikkan token secara otomatis ke setiap request tanpa perlu menulis kode manual berulang. Hasil: endpoint API terlindungi dari akses ilegal (mengembalikan `401 Unauthorized` jika tanpa token), sedangkan operasi dari aplikasi frontend berjalan normal karena token dikirim secara otomatis.

---

## Alur Kerja Sistem

```
[Browser/VueJS SPA]
       |
       | HTTP Request + Authorization: Bearer <token>  (via Axios Interceptors)
       ↓
[CI4 Backend]
       |
       | ApiAuthFilter → cek token → tolak 401 jika tidak ada
       ↓
[Controller API] → [Model] → [Database MySQL]
       |
       | JSON Response
       ↓
[VueJS] → render data ke tampilan
```

---

## Perbedaan Navigation Guards vs CI4 Filter

| Aspek | Vue Router Navigation Guards | CodeIgniter Filter (ApiAuthFilter) |
|-------|-----------------------------|------------------------------------|
| Lokasi | Sisi klien (browser) | Sisi server (CI4) |
| Fungsi | Mencegah perpindahan rute di SPA | Memblokir request HTTP ke endpoint API |
| Cara kerja | Cek `localStorage` sebelum render komponen | Cek HTTP Header `Authorization` sebelum proses request |
| Kelemahan | Bisa dibypass via DevTools browser | Tidak bisa dibypass dari sisi klien |
| Kesimpulan | Keamanan UI/UX saja | Keamanan data sesungguhnya |

> **Kesimpulan:** Navigation Guards hanya melindungi tampilan di sisi klien dan mudah dibypass. CI4 Filter melindungi data di sisi server secara nyata — keduanya perlu digunakan bersama untuk keamanan end-to-end yang optimal.

---

## Teknologi yang Digunakan
- **Backend:** PHP 8, CodeIgniter 4, MySQL (XAMPP)
- **Frontend:** VueJS 3 (CDN), Vue Router 4, Axios
- **Tools:** Visual Studio Code, Postman, Git & GitHub
## KESIMPULAN
Dari praktikum 1–4, dapat dipahami bahwa:
- CodeIgniter 4 mempermudah pengembangan web dengan konsep MVC
- Routing, controller, dan view saling terhubung dalam alur aplikasi
- Database digunakan untuk mengelola data secara dinamis
- Layout dan view cell membantu membuat tampilan lebih rapi
- Sistem login menambah keamanan dan kontrol akses
