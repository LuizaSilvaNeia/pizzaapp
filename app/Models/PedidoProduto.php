<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\{
    Pedido,
    ProdutosTamanhos,
    User
};

class PedidoProduto extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pedido_produtos';
    protected $primaryKey = 'id_pedido_produtos';

    protected $dates = [
                'created_at',
                'updated_at',
                'deleted_at'
    ];

    protected $fillable = [

        'id_user',
        'id_pedido',
        'id_produto_tamanho',
        'preco',
        'qtd',
        'subtotal',
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
        public function pedido(): object {
            return $this->hasOne( Pedido::class,
                                    'id_pedido',
                                    'id_pedido');
        }
        public function produto(): object {
            return $this->hasOne( ProdutosTamanhos::class,
                                    'id_produto_tamanho',
                                    'id_produto_tamanho');
        }

}

