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

| method | endpoint           | auth |
| ------ | ------------------ | ---- |
| GET    | /api/v1/blogs/{id} | N    |

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

## BLOGS FOR ADMIN

### tambah data blogs

digunakan untuk menambahkan detail blogs

| method | endpoint      | auth  |
| ------ | ------------- | ----- |
| POST   | /api/v1/blogs | admin |

-   value yang dikirimkan pada body

| name              |
| ----------------- |
| judul_blog        |
| thumbnail         |
| content           |
| id_penulis (Auto) |

```js
{
message:"success add data detail blogs",
data:[
    {
        id:1,
        judul_blog:"implementasi vue js 3",
        thumbnail:"photo.jpg",
        content:"vue js merupakan progressive framework berdasarkan javascript"
        created_at:"20-12-2020"
        updated_at:"20-11-2021"
    },
]
}
```

### update data blogs

digunakan untuk mengupdate detail blogs

| method | endpoint           | auth  |
| ------ | ------------------ | ----- |
| PUT    | /api/v1/blogs/{id} | admin |

-   value yang dikirimkan pada body

| name              |
| ----------------- |
| judul_blog        |
| thumbnail         |
| content           |
| id_penulis (Auto) |

```js
{
message:"success update detail blogs",
data:[
    {
        id:1,
        judul_blog:"implementasi vue js 3",
        thumbnail:"photo.jpg",
        content:"vue js merupakan progressive framework berdasarkan javascript"
        created_at:"20-12-2020"
        updated_at:"20-11-2021"
    },
]
}
```

### delete data blogs

digunakan untuk menghapus detail blogs

| method | endpoint           | auth  |
| ------ | ------------------ | ----- |
| DELETE | /api/v1/blogs/{id} | admin |

```js
{
message:"success update detail blogs",
data:[
    {
        id:1,
        judul_blog:"implementasi vue js 3",
        thumbnail:"photo.jpg",
        content:"vue js merupakan progressive framework berdasarkan javascript"
        created_at:"20-12-2020"
        updated_at:"20-11-2021"
    },
]
}
```
