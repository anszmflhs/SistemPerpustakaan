<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'peminjamans';
    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'peminjamans_detail');
    }
    // {
    //     return $this->hasMany(Buku::class);
    // }
    public function anggota() {
        return $this->belongsTo(Anggota::class);
    }
}
