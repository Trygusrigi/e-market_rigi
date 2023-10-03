<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barng extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $fillable = ['No', 'Nama_Pengaju', 'Nama_Barang', 'Tanggal_pengajuan', 'Qty', 'Terpenuhi'];


}
