<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            0 => [
                'nome' => 'Shampoo',
                'categoria' => 'Higiene',
                'valor' => '9.90'
            ],
            1 => [
                'nome' => 'Shampo2o',
                'categoria' => 'Higiene2',
                'valor' => '10.90'
            ]
        ];
        DB::table('produtos')->insert($produtos);
    }
}
