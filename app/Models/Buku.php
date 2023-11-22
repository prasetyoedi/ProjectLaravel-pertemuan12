<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['id', 'judul', 'penulis', 'harga', 'tgl_terbit', 'created_at', 'updated_at', 'filepath', 'filename'];
    protected $dates = ['tgl_terbit'];
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function photos()
    {
        return $this->hasMany('App\Buku', 'buku_id, id');
    }
}
