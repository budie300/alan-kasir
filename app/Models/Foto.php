<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = ['food_id', 'gambar'];

    public function food(){
        return $this->belongsTo('App\Models\Food','food_id');
    }
}
