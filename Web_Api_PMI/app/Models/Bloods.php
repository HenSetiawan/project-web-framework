<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Bloods extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

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
