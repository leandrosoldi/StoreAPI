<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoSituacao extends Model
{
    use HasFactory;

    protected $table = "pedido_situacao";
    public $timestamps = false;
}
