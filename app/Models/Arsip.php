<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';
    protected $primaryKey = 'id_arsip';

    protected $fillable = [
        'nomor_surat',
        'judul',
        'id_kategori',
        'deskripsi',
        'file_pdf',
        'tanggal_upload'
    ];

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}

