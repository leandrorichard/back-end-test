<?php
namespace App\Services\Produto\Contracts;


use App\Http\Requests\ProdutoCreateRequest;

interface CreateContract
{
    public function handle(ProdutoCreateRequest $request): array;
}