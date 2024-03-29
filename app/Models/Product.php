<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function suplayer()
    {
        return $this->belongsTo(Suplayer::class, 'suplayerId');
    }

    public function sale()
    {
        return $this->hasMany(Sale::class, 'productId');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'productId');
    }
}
