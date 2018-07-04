<?php

namespace App\Services\Produto\Services;

use App\Http\Resources\ProdutosResource;
use App\Repositories\Produto\RepositoryContract;
use App\Services\Produto\Contracts\IndexContract;
use Illuminate\Http\Request;

class Index implements IndexContract
{
    protected $model;

    public function __construct(RepositoryContract $repositoryContract)
    {
        $this->model = $repositoryContract;
    }

    public function handle(Request $request): array
    {
        if (0 < count($request->input('nome'))) {
            return (new ProdutosResource($this->model->allByName($request)))->toArray($request);
        }
        return (new ProdutosResource($this->model->all()))->toArray($request);
    }
}