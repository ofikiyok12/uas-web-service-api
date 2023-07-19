<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    use HasFactory;
    protected $table='dosen';

    protected $fillable = [ 
        'nama_dosen',
        'alamat',
        'no_hp',
        'matakuliah'
    ];

    
}
