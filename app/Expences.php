<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;


class Expences extends Model
{
    public function categorys()
    {
        return $this->belongsTo(Category::class);
    }
}
