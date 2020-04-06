# Dapodik SDK

***Unofficial*** Dapodik SDK untuk mengakses API yang tersedia dalam aplikasi Dapodik.

Developer dapat mengakses secara langsung API Dapodik menggunakan client HTTP dan JSON jika mereka menginginkannya. Jika Anda ingin langsung mengakses data API Dapodik, SDK ini memberikan Anda beberapa kemudahan:

- *Less code*: Anda tidak perlu dipusingkan dengan *HTTP logic* untuk memulai
- SDK ini menyediakan kumpulan object yang dapat Anda gunakan untuk mengakses data tanpa perlu bekerja langsung dengan JSON, dan dengan penamaan yang lebih *predictable* serta konsisten
- Lapisan tambahan penanganan *error*, tipe data yang lebih ketat, dan *default values* cerdas untuk membatu *debugging* aplikasi Anda 

Semua model yang tersedia dibuat berdasarkan hasil analisis manual data Dapodik sebuah sekolah negeri. *(Semoga pengembang aplikasi Dapodik dapat menerbitkan dokumentasi atau bahkan spesifikasi OpenAPI atau standar metadata API lainnya agar akses API menjadi lebih mudah bagi developer serta semua model dapat digenerate secara otomatis.)*

Terdapat dua *endpoint* yang tersedia dalam SDK ini:
1. WebService http://localhost:5774/WebService/
2. REST http://localhost:5774/rest/ (baru tersedia otentikasinya saja, model belum dibuat)

***Library* ini masih dalam pengembangan ekstensif dan akan menghadirkan *breaking changes* pada versi-versi berikutnya.** 

## Installation

Library ini dapat dipasang menggunakan Composer:

```bash
composer require dimasahmad/dapodik-sdk
```

PHP >=7.4 harus terpasang untuk menjalankan library ini. Tidak ada rencana untuk mendukung versi sebelumnya. 

## Memulai

### WebService Endpoint

Sebelum Anda dapat mengakses *endpoint* WebService, Anda harus mendaftarkan aplikasi Anda melalui halaman Pengaturan -> WebService di dalam aplikasi Dapodik sekolah Anda. Pastikan setting IP sesuai dengan komputer yang akan melakukan koneksi dengan server Dapodik.

```php
$dapodik = new \DimasAhmad\Dapodik\SDK\Auth\WebService();
$dapodik->setAccessToken("accessToken"); // Token yang didapatkan saat registrasi aplikasi
$dapodik->setNpsn("12345678"); // NPSN server Dapodik yang akan diakses

$sekolah = new \DimasAhmad\Dapodik\SDK\Model\WebService\Sekolah($dapodik);

echo $sekolah->getNama();
```

### Rest Endpoint

Gunakan akun operator sebagai parameter otentikasi.

```php
$dapodik = new \DimasAhmad\Dapodik\SDK\Auth\Rest();
$dapodik->setUsername("user@example.com");
$dapodik->setPassword("password");

$dapodik->login();
```

Implementasi model untuk *Rest Endpoint* masih dalam proses pengembangan (analisis manual memakan waktu dan usaha yang sangat besar 😩).

Anda dapat melakukan request menggunakan *method* yang tersedia melalui Rest->client->request($method, $uri), dan proses sendiri response JSON yang didapatkan.

```php
$response = $dapodik->client->request("GET", "/rest/Sekolah");
$sekolah = json_decode($response->getBody()->__toString())->rows[0];

echo $sekolah->nama;
```

## Pengembangan

### Debugging

Anda dapat menggunakan library ini dengan *proxy* seperti [Fiddler](http://www.telerik.com/fiddler) atau [Charles Proxy](https://www.charlesproxy.com/) untuk *debugging request* dan *response* ketika mereka melewati jaringan. Gunakan `setProxyPort` pada objek Auth seperti berikut:

```php
$dapodik->setProxyPort("localhost:8888");
```

Kemudian buka *client* *proxy* Anda untuk melihat *request* dan *response* yang dikirim menggunakan *library* ini.

![Screenshot of Fiddler /WebService/getPesertaDidik](https://github.com/dimasahmad/dapodik-sdk/blob/master/docs/images/fiddler.png)

Ini akan sangat membantu ketika *library* ini tidak memberikan hasil yang Anda harapkan untuk menentukan apakah terdapat *bug* pada API atau SDK ini. Oleh karena itu, Anda mungkin diminta untuk memberikan informasi ini ketika mencoba melakukan triase masalah yang Anda ajukan. 

### Tests

*Unit testing* belum diterapkan, namun akan menjadi prioritas tinggi dalam *milestone* pengembangan versi selanjutnya.

Selain *unit testing*, *functional testing* juga akan dibuat. 

## Dokumentasi

- [Wiki](https://github.com/dimasahmad/dapodik-sdk/wiki)
- [Examples](https://github.com/dimasahmad/dapodik-sdk/wiki/Examples)

## TODO

 - [x] WebService Endpoint (/WebService)
    - [x] Otentikasi menggunakan *bearer token*
    - [x] Pemetaan model dengan setiap *property*
        - [x] /getSekolah
        - [x] /getGtk
        - [x] /getPesertaDidik
        - [x] /getPengguna
        - [x] /getRombonganBelajar
 - [ ] Rest Endpoint (/rest)
    - [x] Otentikasi menggunakan form login dan cookies
    - [ ] Pemetaan model untuk setiap *API call*
 - [ ] Model Enum untuk data referensi (mis: jenis kelamin, agama, status sekolah, mata pelajaran, dsb.) agar aplikasi mengetahui kumpulan nilai data yang tersedia pada sebuah property
 - [ ] Dokumentasi untuk setiap method yang tersedia
 - [ ] Unit testing
 - [ ] Functional testing
 - [ ] Continuous integration
 - [x] Implementasi *proxy* untuk memudahkan *debug request* dan *response* menggunakan aplikasi *HTTP debugging* seperti Fiddler atau Charles Proxy
    
## Kontribusi

Saya menerima kontribusi untuk library ini. [CONTRIBUTING.md](CONTRIBUTING.md) akan membantu sebelum Anda mulai berkontribusi.

## Lisensi

Copyright (c) 2020 Dimas Ahmad Eka Putra. All Rights Reserved.

Library ini menggunakan lisensi MIT. Lihat file [LICENCE](LICENSE) untuk detail lebih lanjut.