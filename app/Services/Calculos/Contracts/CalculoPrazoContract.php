<?php

namespace App\Services\Calculos\Contracts;

use App\Http\Requests\CalculoPrecoRequest;

interface CalculoPrazoContract
{
    public function calcular(CalculoPrecoRequest $request): array;

    public function processaRetorno(\SimpleXMLElement $xml): array;
}