<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'surname', 'email', 'phone', 'status'];
    protected $dates = ['valid_until'];
    
    public function product(){
        return $this->belongsTo(Product::class);
   }
}
