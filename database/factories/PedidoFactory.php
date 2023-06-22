<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_tipo_pedido'=>fake()->numberBetween(1,50),
            'id_user'=>fake()->numberBetween(1,10),
            'id_cliente'=>fake()->numberBetween(1,50),
            'id_cliente_endereco'=>fake()->numberBetween(1,20),
            'id_status'=>'1',
            'id_tipo_pagamento'=>'1',
            'tootal'=>fake()->numberBetween(1,4000),
            'observacoes'=>fake()->paragraph(),
        ];
    }
}
