### Tambah Data Stok Darah

-   digunakan untuk menambah data stok darah

| method | endpoint       | auth | access role |
| ------ | -------------- | ---- | ----------- |
| POST   | /api/v1/blood/ | Y    | admin       |

-   value yang dikirimkan pada body

| name           |
| -------------- |
| jumlah_gol_A   |
| jumlah_gol_B  |
| jumlah_gol_AB   |
| jumlah_gol_O  |
| kategori       |



-   response json

```js
{
message:"success",
data:{
    id:1,
    gol_darah:"A",
    kategori:"Darah Biru",
    jumlah_stok:10,
    deskripsi:"darah para bangsawan"
    }
}
```

### Hapus Data Stok Darah

-   digunakan untuk menghapus data stok darah

| method | endpoint           | auth | access role |
| ------ | ------------------ | ---- | ----------- |
| DELETE | /api/v1/blood/{id} | Y    | admin       |

-   response json

```js
{
message:"success",
data:{
    id:1,
    gol_darah:"A",
    kategori:"Darah Biru",
    jumlah_stok:10,
    deskripsi:"darah para bangsawan"
    }
}
```

### Ambil Data Stok Darah

-   digunakan untuk mengambil data stok darah

| method | endpoint        | auth |
| ------ | --------------- | ---- |
| GET    | /api/v1/bloods/ | N    |

-   response json

```js
{
message:"success",
data:[
    {
        id:1,
        jumlah_gol_A:10,
        jumlah_gol_B:10,
        jumlah_gol_AB:10,
        jumlah_gol_O:10,
        kategori:"Darah Biru",
        jumlah_stok:10,
    },
    {
        id:1,
        jumlah_gol_A:10,
        jumlah_gol_B:10,
        jumlah_gol_AB:10,
        jumlah_gol_O:10,
        kategori:"Darah Biru",
        jumlah_stok:10,
    }
]

}
```

### Ubah Data Stok Darah

-   digunakan untuk mengubah data stok darah

| method | endpoint           | auth | access role |
| ------ | ------------------ | ---- | ----------- |
| PUT    | /api/v1/blood/{id} | Y    | admin       |

-   value yang dikirimkan pada body

| name           |
| -------------- |
| jumlah_gol_A   |
| jumlah_gol_B  |
| jumlah_gol_AB   |
| jumlah_gol_O  |
| kategori       |
| jumlah stok    |

-   response json

```js
{
message:"success",
data:{
    id:1,
    gol_darah:"A",
    kategori:"Darah Biru",
    jumlah_stok:10,
    deskripsi:"darah para bangsawan"
    }
}
```
