<?php

namespace App\Services\Calculos\Services;

use App\Http\Requests\CalculoPrecoRequest;
use App\Services\Calculos\Contracts\CalculoPrazoContract;
use Symfony\Component\HttpFoundation\Response;

class CalculoPrazoCorreios implements CalculoPrazoContract
{
    protected $url;

    public function __construct()
    {
        $this->url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
    }


    public function calcular(CalculoPrecoRequest $request): Response
    {
        $correio = new Correios();
        $correio->setNCdEmpresa('');
        $correio->setSDsSenha('');
        $correio->setSCepOrigem('96010140');
        $correio->setSCepDestino('02460000');
        $correio->setNVlPeso('1');
        $correio->setNCdFormato('1');
        $correio->setNVlComprimento('16');
        $correio->setNVlAltura('5');
        $correio->setNVlLargura('15');
        $correio->setNVlDiametro('0');
        $correio->setSCdMaoPropria('s');
        $correio->setNVlValorDeclarado('200');
        $correio->setSCdAvisoRecebimento('n');
        $correio->setStrRetorno('xml');
        $correio->setNCdServico('40010,41106');

        $dados = Client::send($correio->toArray(), $this->url);

        dd($dados->cServico);
    }
}