<?php

use Illuminate\Database\Seeder;

class PurchaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PurchaseStatus::create(
            ['name_status' => 'No carrinho']
        );

        \App\PurchaseStatus::create(
            ['name_status' => 'Em aberto']
        );

        \App\PurchaseStatus::create(
            ['name_status' => 'Pago']
        );

        \App\PurchaseStatus::create(
            ['name_status' => 'Cancelado']
        );


    }
}
