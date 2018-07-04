<?php

namespace App\Services\Calculos\Contracts;

use App\Http\Requests\CalculoPrecoRequest;
use Symfony\Component\HttpFoundation\Response;

interface CalculoPrazoContract
{
    public function calcular(CalculoPrecoRequest $request): Response;
}