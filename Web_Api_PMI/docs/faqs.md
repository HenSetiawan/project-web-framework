# FAQS ENDPOINT

### ambil semua data faqs

digunakan untuk menampilkan semua data faqs

| method | endpoint    | auth |
| ------ | ----------- | ---- |
| GET    | /api/v1/ask | N    |

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

### tambah data faqs

digunakan untuk menambahkan data faqs

| method | endpoint    | auth  |
| ------ | ----------- | ----- |
| POST   | /api/v1/ask | admin |

-   value yang dikirimkan pada body

| name     |
| -------- |
| question |
| answer   |

```js
{
message:"success add data FAQS",
data:[
    {
        id:1,
        question:"PMI Berbagi",
        answer:"berbagi dilakukan melalui puskesmas terdekat"
    }
]
}
```

### ubah data faqs

digunakan untuk mengubah data faqs

| method | endpoint         | auth  |
| ------ | ---------------- | ----- |
| PUT    | /api/v1/ask/{id} | admin |

-   value yang dikirimkan pada body

| name     |
| -------- |
| question |
| answer   |

```js
{
message:"success update data FAQS",
data:[
    {
        id:1,
        question:"PMI Berbagi",
        answer:"berbagi dilakukan melalui puskesmas terdekat",
    }
]
}
```

### hapus data faqs

digunakan untuk menghapus data faqs

| method | endpoint         | auth  |
| ------ | ---------------- | ----- |
| DELETE | /api/v1/ask/{id} | admin |

```js
{
message:"success delete data FAQS",
data:[
    {
        id:1,
        judul_agenda:"PMI Berbagi",
        deskripsi:"berbagi dilakukan melalui puskesmas terdekat",
    }
]
}
```
