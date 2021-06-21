# BLOGS ENDPOINT

### ambil semua data blogs

digunakan untuk menampilkan semua blogs

| method | endpoint      | auth |
| ------ | ------------- | ---- |
| GET    | /api/v1/blogs | N    |

```js
{
message:"success get all data blogs",
data:[
    {
        id:1,
        judul_blog:"implementasi vue js 3",
        thumbnail:"photo.jpg",
        username:"Dwi Rifki",
        created_at:"20-12-2020"
    },
    {
        id:2,
        judul_blog:"implementasi laravel 8",
        thumbnail:"photo.png",
        username:"Hendy Setiawan",
        created_at:"20-12-2021"
    },
]
}
```

### ambil detail data blogs

digunakan untuk menampilkan detail blogs

| method | endpoint          | auth |
| ------ | ----------------- | ---- |
| GET    | /api/v1/blog/{id} | N    |

```js
{
message:"success get data detail blogs",
data:[
    {
        id:1,
        judul_blog:"implementasi vue js 3",
        thumbnail:"photo.jpg",
        content:"vue js merupakan progressive framework berdasarkan javascript"
        username:"Dwi Rifki",
        created_at:"20-12-2020"
        updated_at:"20-11-2021"
    },
]
}
```

### Ambil Data Stok Darah

-   digunakan untuk mengambil data stok darah

| method | endpoint       | auth |
| ------ | -------------- | ---- |
| GET   | /api/v1/bloods/ | N    | 

-   response json

```js
{
message:"success",
data:[
    {
        id:1,
        gol_darah:"A",
        kategori:"Darah Biru",
        jumlah_stok:10,
        deskripsi:"darah para bangsawan"
    },
    {
        id:2,
        gol_darah:"O",
        kategori:"Darah Suci",
        jumlah_stok:10,
        deskripsi:"darah para bangsawan"
    }
]

}
```

# EVENTS ENDPOINT

### ambil semua data events

digunakan untuk menampilkan semua data events

| method | endpoint       | auth |
| ------ | -------------- | ---- |
| GET    | /api/v1/events | N    |

```js
{
message:"success get all data events",
data:[
    {
        id:1,
        judul_agenda:"PMI Berbagi",
        deskripsi:"berbagi dilakukan melalui puskesmas terdekat"
        updated_at:"20-12-2020"
    },
    {
        id:2,
        judul_agenda:"Donor Darah Kabupaten Bondowoso",
        deskripsi:"berbagi dilakukan melalui puskesmas terdekat"
        updated_at:"20-12-2021"
    },
]
}
```

# FAQS ENDPOINT

### ambil semua data faqs

digunakan untuk menampilkan semua data faqs

| method | endpoint     | auth |
| ------ | ------------ | ---- |
| GET    | /api/v1/asks | N    |

```js
{
message:"success get all data FAQS",
data:[
    {
        id:1,
        question:"Bagaimana Cara Mendonorkan Darah",
        answer:"berbagi dilakukan melalui puskesmas terdekat"
    },
    {
        id:2,
        question:"Donor Darah dekat Bondowoso",
        answer:"berbagi dilakukan melalui puskesmas terdekat"
    },
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

### register relawan

digunakan untuk registrasi relawan baru

| method | endpoint                        | body                                                          | auth |
| ------ | ------------------------------- | ------------------------------------------------------------- | ---- |
| POST   | /api/v1/auth/volunteer/register | username,no_phone,email,password,address,blood_type,birth_day | N    |

```js
{

 message:"success register volunteer",
 data:{
  id:1,
  name:"Ucup",
  email:"ucup.com",
  number_phone:"08223456789",
  address:"Jl. Majapahit no 23 Bondowoso",
  blood_type:"O",
}


}
```
