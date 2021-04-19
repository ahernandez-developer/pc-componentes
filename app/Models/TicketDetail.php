<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model
{
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
}