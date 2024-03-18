<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiObat extends Model
{
    use HasFactory;
    protected $table = 'klasifikasi_obat';
    protected $primaryKey ='id_klasifikasi_obat';
    protected $fillable = ['id_obat','id_klasifikasi','added_by'];

    public function obat()
    {
        return $this->hasMany(Obat::class,'id_obat','id_obat');
    }

    // 2. nah karna KlasifikasiObat itu hanya menampung id_obat dan id_klasifikasi, makadari itu
    // relasikan dengan tabel klasifkikasi
    // relasinya = klasifikasiObat(many) > klasifikasi(one) = makanya pake belongsTo di klasifikasiObat
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class,'id_klasifikasi','id_klasifikasi');
    }

}
