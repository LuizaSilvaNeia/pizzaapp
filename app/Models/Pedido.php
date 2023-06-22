<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\{
    Cliente,
    ClienteEndereco,
    Status,
    TipoPagamento,
    TipoPedido,
    User,
    PedidoProduto
};


class Pedido extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';

    protected $dates = [
                'created_at',
                'updated_at',
                'deleted_at'
    ];

    protected $fillable = [
        'id_tipo_pedido',
        'id_user',
        'id_cliente',
        'id_cliente_endereco',
        'id_status',
        'tipo_pagamento',
        'total',
        'observacoes'
    ];

    /**
     * ------------------------------------------------------------
     *  RELACIONAMENTOS
     * ------------------------------------------------------------
     */

        public function usuario(): object {
            return $this->hasOne(User::class,
                                    'id_user',
                                    'id_user');
        }
        public function cliente(): object {
            return $this->hasOne( Cliente::class,
                                    'id_cliente',
                                    'id_cliente');
        }
        public function endereco(): object {
            return $this->hasOne( Produto::class,
                                    'id_cliente_endereco',
                                    'id_cliente_endereco');
        }
        public function status(): object {
            return $this->hasOne( Status::class,
                                    'id_status',
                                    'id_status');
        }
        public function tipopedido(): object {
            return $this->hasOne( TipoPedido::class,
                                    'id_tipo_pedido',
                                    'id_tipo_pedido');
        }
        public function tipopagamento(): object {
            return $this->hasOne( TipoPagamento::class,
                                    'id_tipo_pagamento',
                                    'id_tipo_pagamento');
        }
        public function produtos(): object {
            return $this->hasOne( PedidoProduto::class,
                                    'id_pedido',
                                    'id_pedido');
        }
}
