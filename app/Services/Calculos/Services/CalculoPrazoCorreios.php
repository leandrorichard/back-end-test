<?php

namespace App\Services\Calculos\Services;

use App\Http\Requests\CalculoPrecoRequest;
use App\Repositories\Produto\RepositoryContract;
use App\Services\Calculos\Contracts\CalculoPrazoContract;

class CalculoPrazoCorreios implements CalculoPrazoContract
{
    protected $url;
    protected $produtoRepository;

    public function __construct(RepositoryContract $repositoryContract)
    {
        $this->url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $this->produtoRepository = $repositoryContract;
    }


    public function calcular(CalculoPrecoRequest $request): array
    {
        try {
            $produto = $this->produtoRepository->find($request->input('pid'));
            $cepOrigem = $request->input('cep_origem');
            $cepDestino = $request->input('cep_destino');

            $correio = new Correios();
            $correio->setNCdEmpresa('');
            $correio->setSDsSenha('');
            $correio->setSCepOrigem($cepOrigem);
            $correio->setSCepDestino($cepDestino);
            $correio->setNVlPeso($produto->peso);
            $correio->setNCdFormato('1');
            $correio->setNVlComprimento($produto->profundidade);
            $correio->setNVlAltura($produto->altura);
            $correio->setNVlLargura($produto->largura);
            $correio->setNVlDiametro(16);
            $correio->setSCdMaoPropria('s');
            $correio->setNVlValorDeclarado($produto->valor);
            $correio->setSCdAvisoRecebimento('n');
            $correio->setStrRetorno('xml');
            $correio->setNCdServico('40010');

            $retorno = Client::send($correio->toArray(), $this->url);
            return $this->processaRetorno($retorno);
        } catch (\Exception $e) {
            throw new $e;
        }

    }

    public function processaRetorno(\SimpleXMLElement $xml): array
    {
        $servico = $xml->cServico;
        $valor = (string) $servico->Valor[0];
        $prazo = (string) $servico->PrazoEntrega[0];

        return array(
            "valor" => $valor,
            "prazo" => $prazo
        );
    }
}