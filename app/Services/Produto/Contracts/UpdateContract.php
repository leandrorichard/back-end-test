<?php

namespace App\Services\Produto\Contracts;


use App\Http\Requests\ProdutoCreateRequest;

interface UpdateContract
{
    public function handle(ProdutoCreateRequest $request): array;
}