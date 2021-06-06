<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Agenda extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'agenda';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'judul_agenda',
       'deskripsi',
       'lokasi',
       'waktu'
    ];
}
