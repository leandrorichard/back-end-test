<?php

namespace App\Http\Controllers\Calculos;

use App\Http\Requests\CalculoPrecoRequest;
use App\Services\Calculos\Contracts\CalculoPrazoContract;
use Symfony\Component\HttpFoundation\Response;

class CalculoPrazoController
{
    protected $service;

    public function __construct(CalculoPrazoContract $calculoPrazoContract)
    {
        $this->service = $calculoPrazoContract;
    }

    public function handle(CalculoPrecoRequest $request): Response
    {
        return $this->service->calcular($request);
    }
}