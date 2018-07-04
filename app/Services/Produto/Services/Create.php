<?php

namespace App\Services\Produto\Services;

use App\Http\Requests\ProdutoCreateRequest;
use App\Http\Resources\ProdutoResource;
use App\Repositories\Produto\RepositoryContract;
use App\Services\Produto\Contracts\CreateContract;

class Create implements CreateContract
{
    protected $model;

    public function __construct(RepositoryContract $repositoryContract)
    {
        $this->model = $repositoryContract;
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