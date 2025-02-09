<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;
    protected $table = 'lineaspedidos';
    protected $fillable = [
        'idPedido',
        'numeroLinea',
        'idProducto',
        'cantidad',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPedido', 'id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto', 'id');
    }
}
