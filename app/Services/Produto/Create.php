<?php

namespace App\Services\Produto;

use App\Http\Requests\ProdutoCreateRequest;
use App\Http\Resources\ProdutoResource;
use App\Produto;
use App\Repositories\Repository;

class Create
{
    protected $model;

    public function __construct(Produto $produto)
    {
        $this->model = new Repository($produto);
    }

    public function handle(ProdutoCreateRequest $request): array
    {
        try {
            $produto = $this->model->create($request->all());
            return (new ProdutoResource($produto))->toArray($request);
        } catch (\Exception $e) {
            throw new $e;
        }
    }
}