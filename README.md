# Laporan-praktikum_pemrograman-web-2

## Nama : Vivit Nurul Hidayah
## NIM : 312410110

Repositori ini berisi kumpulan laporan praktikum mata kuliah **Pemrograman Web 2** yang diselenggarakan di Universitas Pelita Bangsa. Setiap modul mencakup penjelasan tujuan, langkah-langkah pengerjaan, dan kesimpulan analisis.

---

## Daftar Modul Praktikum

### **Modul 1: PHP Framework (Codeigniter)**
* **Tujuan Praktikum:** Memahami konsep dasar *Framework*, arsitektur MVC (Model-View-Controller), dan membuat program sederhana menggunakan CodeIgniter 4.
* **Langkah-langkah Pengerjaan:**
  1. Mempersiapkan lingkungan peladen lokal dan mengaktifkan ekstensi PHP yang dibutuhkan (`php-json`, `php-mysqlnd`, `php-xml`, `php-intl`) melalui pengaturan `php.ini` di XAMPP.
  2. Membuat direktori proyek baru (`lab11_php_ci`) di dalam *root folder web server* (`htdocs`).
  3. Memahami alur kerja *routing* bawaan (*framework*) dan melakukan uji coba penyambungan peladen dasar.
  4. Membuat dan memodifikasi *controller*, *view* (seperti `about.php`), serta *template* parsial untuk menyusun tampilan antarmuka web dasar.
* **Kesimpulan Analisis:** Penggunaan *framework* CodeIgniter sangat membantu mempercepat pengembangan aplikasi web karena struktur direktori dan pustaka dasarnya sudah terstandarisasi dengan baik, serta menerapkan pemisahan logika dan tampilan secara terstruktur lewat pola MVC.

---

### **Modul 2: Framework Lanjutan (CRUD)**
* **Tujuan Praktikum:** Memahami konsep dasar *Model* dan mengimplementasikan operasi dasar basis data CRUD (*Create, Read, Update, Delete*) menggunakan CodeIgniter 4.
* **Langkah-langkah Pengerjaan:**
  1. Menyiapkan basis data relasional MySQL dengan nama `lab_ci4` dan membuat tabel `artikel` yang berisi kolom `id`, `judul`, `isi`, `gambar`, `status`, dan `slug`.
  2. Mengonfigurasi koneksi basis data pada peladen lokal melalui berkas `.env` atau `Database.php`.
  3. Membangun *Model* (`ArtikelModel.php`) untuk menghubungkan aplikasi dengan tabel basis data.
  4. Menambahkan fungsi-fungsi *Controller* untuk menampilkan data, menambah data baru, mengubah data, dan menghapus data, lengkap dengan formulir interaktifnya.
* **Kesimpulan Analisis:** Operasi CRUD merupakan fondasi dari aplikasi web dinamis. CodeIgniter 4 memudahkan manipulasi data secara aman tanpa harus menulis kueri SQL mentah yang panjang, berkat adanya fungsi bawaan dari *Model* dan pustaka intinya.

---

### **Modul 3: View Layout dan View Cell**
* **Tujuan Praktikum:** Memahami dan mengimplementasikan teknik *View Layout* dan *View Cell* di CodeIgniter 4 untuk membuat templat antarmuka web secara modular.
* **Langkah-langkah Pengerjaan:**
  1. Membangun *layout* kerangka utama di dalam folder `app/Views/layout/` sebagai templat dasar halaman situs.
  2. Menggunakan fungsi `renderSection()` dan `extend()` untuk menerapkan pewarisan *layout* pada *view* halaman.
  3. Membuat komponen UI yang independen dan dapat digunakan kembali menggunakan konsep *View Cell* dengan membuat kelas sel dan *view* komponennya.
  4. Memanggil komponen *View Cell* di dalam *view* utama menggunakan perintah `view_cell()`.
* **Kesimpulan Analisis:** Penggunaan *View Layout* dan *View Cell* sangat efektif untuk menjaga konsistensi desain antarmuka web, serta menghindari penulisan kode HTML berulang (*DRY - Don't Repeat Yourself*), sehingga kode program menjadi lebih rapi dan mudah dipelihara.

---

### **Modul 4: Framework Lanjutan (Modul Login)**
* **Tujuan Praktikum:** Memahami sistem autentikasi dasar, penggunaan penyaring (*Filter*), dan membangun sistem *Login* pada CodeIgniter 4.
* **Langkah-langkah Pengerjaan:**
  1. Membuat struktur tabel basis data baru dengan nama `user` untuk menyimpan kredensial akun pengguna (`id`, `username`, `useremail`, `userpassword`).
  2. Membuat `UserModel.php` untuk memproses data pengguna dan verifikasi kata sandi saat masuk.
  3. Membuat *Controller* baru yang menangani logika otentikasi (seperti proses validasi input form login dan inisialisasi Session).
  4. Menambahkan fungsi *Logout* yang menghancurkan sesi aktif dan mengembalikan pengguna ke halaman *login*.
  5. Mendaftarkan rute khusus admin di dalam `Filters.php` dan `Routes.php` menggunakan penutup rute (*closure*) agar halaman terkait terproteksi dari akses pengguna yang belum masuk.
* **Kesimpulan Analisis:** Sistem *Login* dan *Filters* merupakan benteng keamanan paling awal bagi area administratif sebuah aplikasi web. Dengan *Filter* di CodeIgniter 4, kita dapat secara otomatis mencegat permintaan akses halaman sebelum masuk ke *controller*, sehingga data sensitif terlindungi secara efektif.

---

### **Modul 5: Pagination dan Pencarian**
* **Tujuan Praktikum:** Memahami dan mengimplementasikan fitur *pagination* (pembatasan halaman data) dan pencarian data menggunakan CodeIgniter 4.
* **Langkah-langkah Pengerjaan:**
  1. Memodifikasi method `admin_index()` pada `Controller Artikel` dengan menambahkan fungsi `$model->paginate(10)` untuk membatasi data artikel sebanyak 10 baris per halaman.
  2. Menambahkan objek `$pager` pada konfigurasi data yang dikirim ke *view*.
  3. Menampilkan tautan *pagination* pada berkas *view* menggunakan `<?= $pager->links(); ?>`.
  4. Membuat form pencarian sederhana menggunakan metode `GET` dan menghubungkannya dengan fungsi `paginate` agar parameter pencarian tetap terbawa saat berpindah halaman.
* **Kesimpulan Analisis:** Fitur *pagination* dan pencarian sangat penting untuk meningkatkan performa *loading* aplikasi serta memberikan kenyamanan bagi pengguna (*User Experience*) saat mengelola data yang jumlahnya sangat banyak di dalam basis data.

---

### **Modul 6: Relasi Tabel dan Query Builder**
* **Tujuan Praktikum:** Memahami konsep relasi antar tabel (*One-to-Many*) dan menggunakan *Query Builder* di CodeIgniter 4 untuk menggabungkan (*join*) tabel serta menampilkan data yang berelasi.
* **Langkah-langkah Pengerjaan:**
  1. Mempersiapkan tabel `artikel` dan `kategori` yang saling berelasi di dalam basis data.
  2. Menggunakan fungsi `join()` pada *Query Builder* CodeIgniter 4 untuk menghubungkan data artikel dengan kategori yang sesuai.
  3. Menyesuaikan form tambah dan edit artikel agar pengguna dapat memilih kategori artikel melalui elemen `<select>`.
  4. Memodifikasi tampilan detail artikel dan daftar artikel admin untuk menampilkan nama kategori secara dinamis.
* **Kesimpulan Analisis:** Penggunaan *Query Builder* dan fungsi *Join* membantu penulisan kueri basis data menjadi lebih terstruktur, aman dari celah keamanan injeksi SQL, serta memudahkan pengelolaan data yang terdistribusi dalam beberapa tabel.

---

### **Modul 7: Upload File Gambar**
* **Tujuan Praktikum:** Mengimplementasikan fitur pengunggahan (*upload*) berkas gambar pada sistem manajemen artikel menggunakan CodeIgniter 4.
* **Langkah-langkah Pengerjaan:**
  1. Memodifikasi method `add()` pada `Controller Artikel` untuk menangkap objek *file* yang diunggah melalui request.
  2. Menyimpan berkas gambar ke direktori tujuan menggunakan fungsi `$file->move(ROOTPATH 'public/gambar')`.
  3. Menyimpan nama *file* gambar ke dalam basis data melalui model artikel.
  4. Menyesuaikan tag form pada *view* dengan menambahkan atribut `enctype="multipart/form-data"` dan menambahkan elemen *input* tipe *file*.
* **Kesimpulan Analisis:** Validasi dan penanganan *file upload* harus dilakukan dengan cermat, termasuk memastikan direktori penyimpanan memiliki hak akses yang tepat dan membatasi ekstensi *file* yang diizinkan agar server tetap aman dari unggahan berkas berbahaya.

---

### **Modul 8: AJAX**
* **Tujuan Praktikum:** Memahami konsep dan cara kerja *Asynchronous JavaScript and XML* (AJAX) serta mengimplementasikannya untuk memuat data tanpa memuat ulang (*reload*) halaman.
* **Langkah-langkah Pengerjaan:**
  1. Mempersiapkan pustaka jQuery agar dapat diakses pada aplikasi web.
  2. Mengubah method pada *controller* agar dapat mengembalikan data dalam format JSON apabila terdeteksi *request* menggunakan AJAX.
  3. Membuat fungsi JavaScript/jQuery untuk melakukan *request* data secara asinkron ke *endpoint* server dan memperbarui elemen tabel di halaman secara dinamis.
  4. Menambahkan fungsi hapus data menggunakan metode `DELETE` via AJAX dengan dialog konfirmasi sebelum eksekusi.
* **Kesimpulan Analisis:** Implementasi AJAX membuat aplikasi web terasa lebih responsif dan cepat karena interaksi pengguna tidak memerlukan *refresh* halaman secara penuh dari sisi *browser*.

---

### **Modul 9: Implementasi AJAX Pagination dan Search**
* **Tujuan Praktikum:** Menggabungkan fungsionalitas AJAX dengan pencarian dan *pagination* untuk meningkatkan performa dan pengalaman pengguna secara optimal di CodeIgniter 4.
* **Langkah-langkah Pengerjaan:**
  1. Memodifikasi method pengendali (*controller*) untuk merespons parameter pencarian dan nomor halaman dengan format JSON jika diakses melalui AJAX.
  2. Menuliskan skrip AJAX pada sisi klien untuk menangkap peristiwa pengiriman form pencarian dan perubahan *filter* kategori.
  3. Membangun ulang elemen navigasi *pagination* secara mandiri menggunakan JavaScript berdasarkan data `links` yang diterima dari respons server.
  4. Memastikan pemanggilan fungsi *load* data asinkron terjadi saat halaman pertama kali dimuat.
* **Kesimpulan Analisis:** Pemisahan logika tampilan halaman dan data via JSON mengurangi beban *bandwidth* jaringan, karena peladen hanya perlu mengirimkan data yang diminta alih-alih merender ulang seluruh struktur HTML halaman.

---

### **Modul 10: API**
* **Tujuan Praktikum:** Memahami konsep dasar *Application Programming Interface* (API), arsitektur RESTful, serta membangun *backend* API menggunakan kerangka kerja CodeIgniter 4.
* **Langkah-langkah Pengerjaan:**
  1. Memahami prinsip kerja REST yang membagi peran antara *REST Server* (penyedia data) dan *REST Client* (pengonsumsi data).
  2. Membuat *controller* API yang merespons metode HTTP seperti `GET`, `POST`, `PUT`, dan `DELETE`.
  3. Mengembalikan format respons JSON standar yang menyertakan status kode, pesan, dan data sumber daya.
  4. Melakukan pengujian *endpoint* API secara langsung menggunakan aplikasi Postman untuk memastikan operasi CRUD berjalan sukses.
* **Kesimpulan Analisis:** Arsitektur REST API memungkinkan pemisahan yang jelas antara *backend* (logika dan basis data) dan *frontend* (antarmuka pengguna), sehingga sistem menjadi lebih mudah diskalakan dan dapat diintegrasikan dengan berbagai platform lain (web, seluler, maupun desktop).

---

### **Modul 11: VueJS**
* **Tujuan Praktikum:** Memahami konsep dasar kerangka kerja JavaScript VueJS 3 serta membangun antarmuka pengguna (*Frontend API*) berbasis komponen.
* **Langkah-langkah Pengerjaan:**
  1. Mempersiapkan lingkungan kerja dan memuat pustaka VueJS 3 via CDN di dalam proyek klien.
  2. Membangun struktur *Single Page Application* (SPA) sederhana dengan arsitektur reaktif berbasis data terikat.
  3. Membuat komponen antarmuka modular untuk menampilkan daftar artikel, serta mengintegrasikan modal *pop-up* untuk form tambah dan ubah data.
  4. Menghubungkan antarmuka VueJS dengan *endpoint* REST API yang telah dibuat pada modul sebelumnya untuk mengambil dan menampilkan data artikel.
* **Kesimpulan Analisis:** Pendekatan reaktif dan berbasis komponen pada VueJS memudahkan pengembang dalam menyusun antarmuka web yang kompleks dan interaktif tanpa harus memuat ulang halaman secara tradisional.

---

### **Modul 12: VueJS Komponen dan Routing (Single Page Application)**
* **Tujuan Praktikum:** Memahami konsep *Client-Side Routing* menggunakan Vue Router berbasis CDN untuk membangun aplikasi SPA (*Single Page Application*).
* **Langkah-langkah Pengerjaan:**
  1. Mengimplementasikan pustaka Vue Router untuk mengelola perpindahan tampilan antar halaman di sisi klien.
  2. Memecah antarmuka menjadi beberapa komponen terisolasi yang dapat digunakan kembali.
  3. Menambahkan rute baru (misalnya `/about`) beserta komponen profil yang menampilkan data diri (Nama, NIM, Kelas, dan Foto).
  4. Memastikan perpindahan menu navigasi berjalan secara instan tanpa memicu *hard-reload* pada peramban.
* **Kesimpulan Analisis:** *Client-side routing* memberikan pengalaman navigasi aplikasi yang sangat cepat dan mulus menyerupai aplikasi desktop, karena seluruh perpindahan halaman dikelola langsung oleh JavaScript di sisi peramban pengguna.

---

### **Modul 13: VueJS Autentikasi dan Navigation Guards (SPA Security)**
* **Tujuan Praktikum:** Memahami konsep keamanan rute di sisi klien (*Client-Side Security*) dan menerapkan *Navigation Guards* (`router.beforeEach`) untuk memproteksi halaman dari akses ilegal.
* **Langkah-langkah Pengerjaan:**
  1. Membuat *endpoint* API autentikasi pada *backend* CodeIgniter 4 yang akan memverifikasi kredensial pengguna dan menghasilkan token.
  2. Membuat modul form login pada aplikasi SPA *Frontend*.
  3. Mengimplementasikan fungsi pelindung rute `router.beforeEach()` pada Vue Router untuk memeriksa status login sebelum mengizinkan akses ke komponen halaman tertentu.
  4. Mengatur perubahan status tombol menu navigasi secara dinamis setelah pengguna berhasil masuk.
* **Kesimpulan Analisis:** *Client-side security* menggunakan *Navigation Guards* efektif untuk menyembunyikan atau membatasi navigasi menu bagi pengguna yang belum terautentikasi demi menjaga integritas antarmuka, namun tetap memerlukan validasi keamanan berlapis pada sisi peladen untuk menjamin keamanan data yang sebenarnya.

---

### **Modul 14: Keamanan API, Autentikasi Token, dan Axios Interceptors**
* **Tujuan Praktikum:** Mengimplementasikan keamanan *end-to-end* menggunakan *Token-Based Authentication*, *Filters* pada CodeIgniter 4, dan penyisipan token otomatis menggunakan *Axios Interceptors* pada VueJS.
* **Langkah-langkah Pengerjaan:**
  1. Menerapkan *Filters* pada *backend* CodeIgniter 4 untuk menolak akses ke *endpoint* API yang tidak menyertakan token valid.
  2. Mengonfigurasi pustaka Axios pada *frontend* VueJS agar secara otomatis menyertakan parameter `Authorization: Bearer <string_token>` pada setiap *request* HTTP yang dikirim ke *backend*.
  3. Melakukan pengujian transmisi data secara *end-to-end* saat melakukan manipulasi data (Tambah/Ubah/Hapus artikel).
  4. Menyertakan bukti tangkapan layar (*screenshot*) penolakan akses via Postman serta injeksi token pada *tab Network* di *Browser Developer Tools*.
* **Kesimpulan Analisis:** Perbedaan mendasar terletak pada lapis pertahanannya: *Vue Router Navigation Guards* (sisi klien) berfungsi untuk membatasi navigasi antarmuka dan visibilitas menu agar sesuai hak akses, sedangkan *CodeIgniter Filters* (sisi server) adalah benteng pertahanan utama yang secara mutlak melindungi integritas basis data dan *endpoint* API dari akses maupun eksekusi ilegal secara langsung.
