<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['title'];  //อนุญาต ให้บันทึกข้อมุลจากฟอร์ม แค่ title เท่านั้น

    public function episodes(){
        return $this->hasMany(Episodes::class);
    }
}
