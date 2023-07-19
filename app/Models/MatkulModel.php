<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulModel extends Model
{
    use HasFactory;
    protected $table='matakuliah';

    protected $fillable = [ 
        'nama_mk',
        'sks',
        'smester',
        'jumlah_mhs'
    ];

}
