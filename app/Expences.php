<?php

namespace App;

use App\Categor;
use Illuminate\Database\Eloquent\Model;


class Expences extends Model
{
    public function category()
    {
        return $this->belongsTo(Categor::class );
    }
}
