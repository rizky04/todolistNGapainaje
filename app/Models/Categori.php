<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categori extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'keterangan'
    ];

    protected $dates = ['deleted_at'];

    public function catetan(){
        return $this->hasMany(Catetan::class, 'categori_id', 'id');
    }
}

