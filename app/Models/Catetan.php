<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catetan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'catatan', 'categori_id'
    ];

    protected $dates = ['deleted_at'];

    public function categori(){
        return $this->belongsTo(Categori::class, 'categori_id', 'id');
    }
}
