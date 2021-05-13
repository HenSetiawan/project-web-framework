# DOCUMENTATION API

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

 ### ambil data user
  digunakan untuk mengambil data user berdasarkan id

| method | endpoint         | auth   |access role|
|--------|------------------|--------|-----------|
| GET    | /api/v1/user/{id}|  Y     |admin      |


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

# Volunteer Endpoint

### ambil semua data relawan
 digunakan untuk mengambil data semua relawan yang terdaftar

| method | endpoint            |auth |
|--------|---------------------|-----|
| GET    | /api/v1/volunteers/ |N    |

``` js
{

  message:"success gel all data volunteers",
  data:[
      {
          id:1,
          name:"Budi",
          address:"Jl. Nasution no 88 Bondowoso"
          blood_type:"A",
          birth_day:"23-01-2001"
      },
      {
          id:2,
          name:"Ucup",
          address:"Jl. Majapahit no 23 Bondowoso",
          blood_type:"O",
          birth_day:"23-01-2002"
      },

  ]

}
   ```

### detail relawan
 digunakan untuk mengambil data relawan berdasarkan id

| method | endpoint                | params     |auth |access role        |
|--------|-------------------------|------------|-----|-------------------|
| GET    | /api/v1/volunteer/{id} | id relawan |Y    |admin,user,volunter |

``` js
{

    id:2,
    name:"Ucup",
    email:"ucup.com",
    number_phone:"08223456789",
    address:"Jl. Majapahit no 23 Bondowoso",
    blood_type:"O",
    birth_day:"23-01-2001"

}
   ```



### hapus relawan
 digunakan untuk menghapus data relawan berdasarkan id

| method | endpoint                | params     |auth|access role|
|--------|-------------------------|------------|----|-----------|
| DELETE | /api/v1/volunteer/{id} | id relawan |Y   |admin      |

``` js
{
    message:"success delete volunteer",
    data:[
        id:2,
        name:"Ucup",
        email:"ucup.com",
        number_phone:"08223456789",
        address:"Jl. Majapahit no 23 Bondowoso",
        blood_type:"O",
        birth_day:"23-01-2001"
    ]
}
   ```

### ubah data relawan
 digunakan untuk mengubah data relawan yang telah terdaftar

| method | endpoint                |body                                      |auth|access role|
|--------|--------------------------------------------------------------------|----|-----------|
| UPDATE | /api/v1/volunteer/      |username,no_phone,email,password,address,blood_type,birth_day| Y  |volunteer  |

``` js
{
    message:"success update volunteer",
    data:[
        id:2,
        name:"Ucup",
        email:"ucup.com",
        number_phone:"08223456789",
        address:"Jl. Majapahit no 23 Bondowoso"
        blood_type:"O",
        birth_day:"23-01-2001"
    ]
}
   ```

### register relawan
digunakan untuk registrasi relawan baru

| method | endpoint                         | body                                                         |auth |
|--------|----------------------------------|--------------------------------------------------------------|-----|
| POST   | /api/v1/auth/volunteer/register  |username,no_phone,email,password,address,blood_type,birth_day |N    |


``` js
{

  id:1,
  name:"Ucup",
  email:"ucup.com",
  number_phone:"08223456789",
  address:"Jl. Majapahit no 23 Bondowoso",
  blood_type:"O",
  desc:"volunteer registration is successful"

}
   ```


### login relawan
digunakan untuk login relawan yang sudah terdaftar

| method | endpoint                 | body              |
|--------|--------------------------|-------------------|
| POST   | /api/v1/auth/volunteer/login  | username,password |

``` js
{

  id:1,
  name:"Ucup",
  email:"ucup.com",
  number_phone:"08223456789",
  address:"Jl. Majapahit no 23 Bondowoso",
  blood_type:"O",
  token:"vjwegrngknergknelrngklerlgnergklerklkle"

}
   ```


### Admin Endpoint

akan diupdate


