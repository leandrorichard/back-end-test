<?php

namespace App\Services\Produto\Services;

use App\Http\Resources\ProdutosResource;
use App\Produto;
use App\Repositories\Repository;
use App\Services\Produto\Contracts\IndexContract;
use Illuminate\Http\Request;

class Index implements IndexContract
{
    protected $model;

    public function __construct(Produto $produto)
    {
        $this->model = new Repository($produto);
    }

    public function handle(Request $request): array
    {
        $headerAccept = $request->headers->get("accept");
        $resource = [];

        if("application/xml" == $headerAccept) {
            if (0 < count($request->input('nome'))) {
                $resource = (new ProdutosResource($this->model->allByName($request)))->toArray($request);
            } else {
                $resource = (new ProdutosResource($this->model->all()))->toArray($request);
            }
        } else {
            if (0 < count($request->input('nome'))) {
                $resource = (new ProdutosResource($this->model->allByName($request)))->toArray($request);
            } else {
                $resource = (new ProdutosResource($this->model->all()))->toArray($request);
            }
        }

        return $resource;
    }
}