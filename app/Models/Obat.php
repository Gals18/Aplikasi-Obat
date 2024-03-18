<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $primaryKey ='id_obat';
    protected $fillable = ['nama_obat','stok_obat','harga_obat','deskripsi_obat','added_by'];

    public function user()
    {
        return $this->belongsTo(User::class,'added_by','id_user');
    }

    public function klasifikasiObat()
    {
        return $this->hasMany(KlasifikasiObat::class,'id_obat','id_obat');
    }
}
