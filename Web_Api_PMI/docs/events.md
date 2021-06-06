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

### ambil details data events

digunakan untuk menampilkan details data events

| method | endpoint           | auth                   |
| ------ | ------------------ | ---------------------- |
| GET    | /api/v1/event/{id} | user, admin, volunteer |

```js
{
message:"success get data detail event",
data:[
    {
        id:1,
        judul_agenda:"PMI Berbagi",
        deskripsi:"berbagi dilakukan melalui puskesmas terdekat",
        lokasi:"Jember",
        waktu:"25-11-2020",
    }
]
}
```

### tambah data events

digunakan untuk menambahkan semua data events

| method | endpoint      | auth  |
| ------ | ------------- | ----- |
| POST   | /api/v1/event | admin |

-   value yang dikirimkan pada body

| name         |
| ------------ |
| judul_agenda |
| deskripsi    |
| lokasi       |
| waktu        |

```js
{
message:"success add data event",
data:[
    {
        id:1,
        judul_agenda:"PMI Berbagi",
        deskripsi:"berbagi dilakukan melalui puskesmas terdekat"
        lokasi:"Jember"
        waktu:"20-12-2020"
    }
]
}
```

### ubah data events

digunakan untuk mengubah data events

| method | endpoint           | auth  |
| ------ | ------------------ | ----- |
| PUT    | /api/v1/event/{id} | admin |

-   value yang dikirimkan pada body

| name         |
| ------------ |
| judul_agenda |
| deskripsi    |
| lokasi       |
| waktu        |

```js
{
message:"success update data event",
data:[
    {
        id:1,
        judul_agenda:"PMI Berbagi",
        deskripsi:"berbagi dilakukan melalui puskesmas terdekat"
        lokasi:"Bondowoso"
        waktu:"20-12-2020"
    }
]
}
```

### hapus data events

digunakan untuk menghapus data events

| method | endpoint           | auth  |
| ------ | ------------------ | ----- |
| DELETE | /api/v1/event/{id} | admin |

```js
{
message:"success delete data event",
data:[
    {
        id:1,
        judul_agenda:"PMI Berbagi",
        deskripsi:"berbagi dilakukan melalui puskesmas terdekat"
        lokasi:"Bondowoso"
        waktu:"20-12-2020"
    }
]
}
```
