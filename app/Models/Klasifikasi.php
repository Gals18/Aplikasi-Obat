<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;
    protected $table = 'klasifikasi';
    protected $primaryKey ='id_klasifikasi';
    protected $fillable = ['nama_klasifikasi','deskripsi_klasifikasi','added_by'];

    public function user()
    {
        return $this->belongsTo(User::class,'added_by','id_user');
    }
}
