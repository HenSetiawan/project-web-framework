<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bloods extends Model
{
    use  HasFactory, Notifiable;

    protected $table = 'stok_darah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gol_darah',
        'kategori',
        'jumlah_stok',
        'deskripsi',
    ];
}
