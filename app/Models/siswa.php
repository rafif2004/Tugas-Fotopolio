<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable=[
        'nisn',
        'nama',
        'alamat',
        'foto',
        'jk',
        'about'
    ];
    protected $table = 'siswa';

    public function kontak(){
        return$this->belongsToMany('App\Models\jenis_kontak', 'jenis_kontak_siswa')->withPivot('deskripsi', 'id');
    }
    public function project (){
        return$this->hasMany('App\Models\project', 'id_siswa');
    }
}
