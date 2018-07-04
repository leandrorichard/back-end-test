<?php

namespace App\Services\Produto\Services;

use App\Http\Resources\ProdutoResource;
use App\Repositories\Produto\RepositoryContract;
use App\Services\Produto\Contracts\ShowContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Show implements ShowContract
{
    protected $model;

    public function __construct(RepositoryContract $repositoryContract)
    {
        $this->model = $repositoryContract;
    }

    public function handle(Request $request)
    {
        if ($id = $request->route('produto')) {
            return (new ProdutoResource($this->model->find($id)))->toArray($request);
        }

        throw new ModelNotFoundException();
    }
}