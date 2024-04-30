<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'stoks';
    public function films() :BelongsTo
    {
        return $this->belongsTo(Film::class,'film_id','id');
    }
    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }
}
