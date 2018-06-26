<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = $this->obterProdutos();
        DB::table('produtos')->insert($produtos);
    }

    private function obterProdutos(): array
    {
        $produtos = array();

        array_push($produtos, array(
            'nome' => 'Microsoft Console Xbox One X, 1 TB, Preto',
            'sku' => 'B078CXX533',
            'peso' => 5.58,
            'altura' => 12.7,
            'largura' => 46.09,
            'profundidade' => 30.9,
            'valor' => 2725.70
        ));

        array_push($produtos, array(
            'nome' => 'Controle Xbox One S Wireless Black Slim Preto',
            'sku' => 'B01LPZM7VI',
            'peso' => 0.798,
            'altura' => 18,
            'largura' => 18,
            'profundidade' => 7,
            'valor' => 260.00
        ));

        return $produtos;
    }
}
