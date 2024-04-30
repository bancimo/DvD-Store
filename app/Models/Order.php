<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // 1 Order hanya Bisa Memiliki 1  Stok film
    public function stoks():BelongsTo
    {
        return $this->belongsTo(Stok::class,"stok_id","id");
    }
    // 1 Order Hanya Terkait dengan 1 Customer
    public function regists():BelongsTo
    {
        return $this->belongsTo(Regist::class,"regist_id",'id');
    }

}
