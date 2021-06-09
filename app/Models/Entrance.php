<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    // public function user(){
    //     return $this->belongsTo("App\Models\User","idUser","id");
    // }
}
