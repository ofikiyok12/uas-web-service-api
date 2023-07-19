<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiModel extends Model
{
    use HasFactory;
    protected $table='nilai';

    protected $fillable = [ 
        'id_mahasiswa',
        'id_matakuliah',
        'id_dosen',
        'nilai'
    
    ];
//=========relasi tabel mahasiswa=====================================
    public function mahasiswa()
{
    return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa');
    // return $this->hasMany(MahasiswaModel::class, 'id_mahasiswa');
}
//====================//==============================================

//=========relasi tabel matakulia =====================================
    public function matkul()
{
    return $this->belongsTo(MatkulModel::class, 'id_matakuliah');
}
//====================//==============================================

//=========relasi tabel dosen =====================================
    public function dosen()
{
    return $this->belongsTo(DosenModel::class, 'id_dosen');
}
//====================//==============================================

}
