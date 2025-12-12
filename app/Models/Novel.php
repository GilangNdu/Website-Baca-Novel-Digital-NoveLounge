<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $table = 'novels';          // nama tabel
    protected $primaryKey = 'id_novel';   // primary key
    public $incrementing = true;          // PK auto increment
    public $timestamps = true;            // created_at & updated_at aktif

    protected $fillable = [
        'judul',
        'penulis',
        'cover',
        'kategori',
        'sinopsis',
        'cerita_lengkap',
        'jumlah_dibaca',
    ];
}

