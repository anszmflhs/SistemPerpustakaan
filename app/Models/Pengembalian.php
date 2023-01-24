<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'pengembalians_detail');
    }
}
