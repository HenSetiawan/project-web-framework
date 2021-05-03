## DOCUMENTATION API

 ##  User Endpoint

 - ambil data user
  digunakan untuk mengambil data user berdasarkan id(primary key) 

| method | endpoint         | params  |
|--------|------------------|---------|
| GET    | /api/v1/user/{id} | id user |


 ##  Auth Endpoint

 - register user
 digunakan untuk melakukan registrasi user baru

| method | endpoint         | body  |
|--------|------------------|---------|
| POST    | /api/v1/auth/user/register |username,no hp,email password  |

- login user
digunakan sebagai auth user yang telah terdaftar

| method | endpoint         | body  |
|--------|------------------|---------|
| POST   | /api/v1/auth/user/login | username,password |


## Volunteer Endpoint

- ambil semua data relawan
 digunakan untuk mengambil data semua relawan yang terdaftar

| method | endpoint         | params  |
|--------|------------------|---------|
| GET    | /api/v1/volunteers | null |

- detail relawan
 digunakan untuk mengambil data relawan brdasarkan id

| method | endpoint         | params  |
|--------|------------------|---------|
| GET    | /api/v1/volunteers/{id} | id relawan |

- hapus relawan
 digunakan untuk menghapus data relawan berdasarkan id

| method | endpoint         | params  |
|--------|------------------|---------|
| DELETE    | /api/v1/volunteers/{id} | id relawan |


