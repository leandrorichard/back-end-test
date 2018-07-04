<?php

namespace App\Services\Produto\Services;


use App\Http\Requests\ProdutoCreateRequest;
use App\Http\Resources\ProdutoResource;
use App\Produto;
use App\Repositories\Repository;
use App\Services\Produto\Contracts\UpdateContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Update implements UpdateContract
{
    protected $model;

    public function __construct(Produto $produto)
    {
        $this->model = new Repository($produto);
    }

    public function handle(ProdutoCreateRequest $request): array
    {
        try {
            if ($id = $request->route('produto')) {
                $produto = $this->model->find($id);
                $produto->update($request->all());
                return (new ProdutoResource($produto))->toArray($request);
            }
            throw new ModelNotFoundException();
        } catch (\Exception $e) {
            throw new $e;
        }
    }
}