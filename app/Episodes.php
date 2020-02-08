<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    protected $fillable=[
        'title',
        'hosting',
        'file_name',
    ];

    public function serie(){
        return $this->belongTo(Serie::class);
    }
}
