### Tambah Data Stok Darah

-   digunakan untuk menambah data stok darah

| method | endpoint       | auth | access role |
| ------ | -------------- | ---- | ----------- |
| POST   | /api/v1/blood/ | Y    | admin       |

-   value yang dikirimkan pada body

| name           |
| -------------- |
| golongan_darah |
| kategori       |
| jumlah stok    |
| deskripsi      |

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

| method | endpoint       | auth | access role |
| ------ | -------------- | ---- | ----------- |
| DELETE   | /api/v1/blood/{id} | Y    | admin       |

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


### Ubah Data Stok Darah

-   digunakan untuk mengubah data stok darah

| method | endpoint       | auth | access role |
| ------ | -------------- | ---- | ----------- |
| PATCH   | /api/v1/blood/{id} | Y    | admin       |

-   value yang dikirimkan pada body

| name           |
| -------------- |
| golongan_darah |
| kategori       |
| jumlah stok    |
| deskripsi      |

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

