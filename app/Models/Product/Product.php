<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = "products";

    protected $fillable = [
        'id', 
        'name',
        'price',
        'description',
        'quantity',
        'image',
        'created_at',
    ];


    public $timestamps = true;
}
