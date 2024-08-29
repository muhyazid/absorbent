<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id');
    }
}
