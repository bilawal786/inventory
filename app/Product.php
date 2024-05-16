<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'stock', 'sale'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
