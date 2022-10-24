<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'project';
    protected $guarded = ['id'];
    protected $fillabel = [
        'id_siswa',
        'nama_project',
        'deskripsi',
        'tanggal',
    ];
    public function siswa (){
        return$this->belongsTo('App\Models\siswa', 'id_siswa');
    }
}