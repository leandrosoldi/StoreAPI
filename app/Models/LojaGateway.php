<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LojaGateway extends Pivot
{
    use HasFactory;
    public $incrementing = true;
    protected $table ="lojas_gateway";
    public $timestamps = false;

}
