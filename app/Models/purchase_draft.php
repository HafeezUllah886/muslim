<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_draft extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function product(){
        return $this->belongsTo(products::class, 'product_id', 'id');
    }
}
