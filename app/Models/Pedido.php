<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    public $timestamps = false;

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente','id_cliente');
    }
    
    public function situacao(){
        return $this->belongsTo('App\Models\PedidoSituacao','id_situacao');
    }
   
    public function loja(){
        return $this->belongsTo('App\Models\Loja','id_loja');
    }

    public function pagamento()
    {
        return $this->hasOne('App\Models\PedidoPagamento','id_pedido');
    }


}
