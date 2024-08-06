<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name', 'categories_id', 'harga', 'photo', 'deskripsi', 'kontak',
    ];

    protected $hidden = [

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
