 
 ### Login Admin
 - digunakan untuk login admin

| method | endpoint         | auth   |
|--------|------------------|--------|
| POST   | /api/v1/auth/admin/login   |  N    |

- value yang dikirimkan pada body

| name     | 
|----------|
| username | 
| password | 

- response json

```js
{
message:"success login",
data:{
  id:1,
  username:"Ucup",
  email:"ucup.com",
  number_phone:"08223456789",
  token:"vjwegrngknergknelrngklerlgnergklerklkle"
}

}
```


 ### Logout Admin
 - digunakan untuk login admin

| method | endpoint         | auth   |
|--------|------------------|--------|
| POST   | /api/v1/auth/admin/logout   |  Y   |

- response json

```js
{

  message:"logout successful",

}
```



  ### Tambah Data Admin
 - digunakan untuk menambah admin baru

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| POST   | /api/v1/admin/   |  Y     |admin      |

- value yang dikirimkan pada body

| name     | 
|----------|
| username | 
| email    | 
| no_handphone | 
| password |

- response json
```js
{
message:"success",
data:{
  id:1,
  name:"Ucup",
  email:"ucup.com",
  number_phone:"08223456789",
}

}
```



 ### Hapus Data Admin
 - digunakan untuk menghapus data admin

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| DELETE   | /api/v1/admin/{id}   |  Y     |admin      |

- response json
```js
{
message:"success",
data:{
  id:1,
  name:"Ucup",
  email:"ucup.com",
  number_phone:"08223456789",
}

}
```


 ### Ubah Data Admin
 - digunakan untuk mengubah data admin

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| PATCH   | /api/v1/admin/{id}   |  Y     |admin      |

- value yang dikirimkan pada body

| name     | 
|----------|
| username | 
| email    | 
| no_handphone | 

- response json
```js
{
message:"success",
data:{
  id:1,
  name:"Ucup baru",
  email:"ucupbaru.com",
  number_phone:"08223456789",
}

}
```


 ### Ambil Data Admin yang Sedang Aktif
 - digunakan untuk mengambil data admin

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| GET  | /api/v1/admin/  |  Y     |admin      |


- response json
```js
{
message:"success",
data:{
  id:1,
  name:"Ucup baru",
  email:"ucupbaru.com",
  number_phone:"08223456789",
}

}
```






