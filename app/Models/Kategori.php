<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $incrementing = true; 
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function arsip()
    {
        return $this->hasMany(Arsip::class);
    }
}
