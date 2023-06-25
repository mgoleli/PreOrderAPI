<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'ad', 'soyad', 'email', 'telefon', 'durum'];
    protected $dates = ['valid_until'];
    
    public function product(){
        return $this->belongsTo(Product::class);
   }
}
