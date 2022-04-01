<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    protected $table ="lojas";
    public $timestamps = false;

    public function gateway(){
        return $this->belongsToMany('App\Models\Gateway', 'lojas_gateway','id_loja','id_gateway')
                    ->as('lojas_gateway')
                    ->using('App\Models\LojaGateway')->withPivot('id');
    }
}
