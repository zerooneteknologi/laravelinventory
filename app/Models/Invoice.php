<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasMany(Order::class, 'invoiceId');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId');
    }
}
