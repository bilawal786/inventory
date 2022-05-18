<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'lead_id', 'comment'
    ];
    public function lead()
    {
        return $this->belongsTo('App\Lead', 'lead_id')->select(['id']);
    }
}
