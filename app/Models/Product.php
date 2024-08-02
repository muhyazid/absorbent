<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_number',
        'name',
        'kategori_id',
        'image',
        'description',
        'stok',
        'size',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id')->withDefault();
    }


     public static function getCustomSpillKitProducts()
    {
        // Misalkan kategori ID 1 dan 2 adalah untuk 'Absorbent Chemical' dan 'Absorbent Oil Pad'
        return self::whereIn('kategori_id', [4, 5])->get();
    }



}
