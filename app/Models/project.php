<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'project';
    protected $fillable = [
        'id_siswa',
        'nama project',
        'deskripsi',
        'tanggl',
    ];
    public function siswa (){
        return$this->belongsTo('App\Models\siswa', 'id');
    }
}