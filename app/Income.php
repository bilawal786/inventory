<?php

namespace App;
use App\Categor;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function category()
    {
        return $this->belongsTo(Categor::class);
    }
}
