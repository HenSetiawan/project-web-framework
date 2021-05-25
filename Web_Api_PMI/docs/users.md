 #  User Endpoint

  ### ambil data semua user
  digunakan untuk mengambil semua daftar user

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| GET    | /api/v1/users/   |  Y      |admin      |


``` js
{
    message:"success get all users data",
    data:[
            {
                id:1,
                username:"Hendy Setiawan",
                email:"hendy@gmil.com",
                number_phone:"08123456789"
            },
            {
                id:2,
                username:"Hendy Setiawan",
                email:"hendy@gmil.com",
                number_phone:"08123456789"
            }
    ]
}
   ```

 ### ambil data user aktif
  digunakan untuk mengambil data user berdasarkan token

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| GET    | /api/v1/user/|  Y     |user  |


``` js
{

  id:1,
  username:"Hendy Setiawan",
  email:"hendy@gamil.com",
  number_phone:"08123456789"

}
   ```


### ambil data user
  digunakan untuk mengambil data user berdasarkan id

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| GET    | /api/v1/user/{id}|  Y     |admin     |


``` js
{

  id:1,
  username:"Hendy Setiawan",
  email:"hendy@gamil.com",
  number_phone:"08123456789"

}
   ```


 ### hapus data user
  digunakan untuk menghapus data user berdasarkan id

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| DELETE    | /api/v1/user/{id}  |  Y   |admin

``` js
{

  
  message:"success delete user",
  data:[
      id:1,
      username:"Hendy Setiawan",
      email:"hendy@gamil.com",
      number_phone:"0812345678"
  ]

}
   ```


### ubah data user
  digunakan untuk mengubah data user berdasarkan user yang telah login

| method | endpoint         |body                       | auth|access role|
|--------|------------------|---------------------------|-----|-----------|
| UPDATE | /api/v1/user/    |username,email,number phone|Y    |user       |

``` js
{

  
  message:"success update user",
  data:[
      id:1,
      username:"Hendy Setiawan",
      email:"hendy@gamil.com",
      number:"number phone"
  ]

}
   ```

 ### register user
 digunakan untuk melakukan registrasi user baru

| method | endpoint                    | body                           |auth |
|--------|-----------------------------|--------------------------------|-----|
| POST   | /api/v1/auth/user/register  |username,no hp,email, password  |N    |


``` js
{

  id:1,
  username:"Hendy Setiawan",
  email:"hendy@gmail.com",
  desc:"user registration is successful"

}
   ```

### login user
digunakan untuk login user yang telah terdaftar

| method | endpoint                 | body              |
|--------|--------------------------|-------------------|
| POST   | /api/v1/auth/user/login  | email,password |

``` js
{

  id:1,
  username:"Hendy Setiawan",
  email:"hendy@gmail.com",
  token:"vjwegrngknergknelrngklerlgnergklerklkle"

}
   ```

### logout user
digunakan untuk keluar dan menghapus token

| method | endpoint                 | auth|
|--------|--------------------------|-----|
| POST   | /api/v1/auth/user/logout |Y|

``` js
{

  message:"logout successful",
  
}
   ```
