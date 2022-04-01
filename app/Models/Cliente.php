<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; 
    public $timestamps = false;

    public function loja()
    {
        return $this->belongsTo('App\Models\Loja','id_loja');
    }
}
