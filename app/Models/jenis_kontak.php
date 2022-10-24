<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kontak extends Model
{
    use HasFactory;
    protected $fillabel=[
        'deskripsi'
    ];
    protected $table = 'jenis_kontak';

    public function siswa (){
        return $this->belongsToMany('App\models\siswa', 'jenis_kontak_siswa');
    }
}
