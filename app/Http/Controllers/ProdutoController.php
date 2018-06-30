<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoCreateRequest;
use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutosResource;
use App\Produto;
use App\Repositories\Repository;
use Illuminate\Http\JsonResponse;


class ProdutoController extends Controller
{
    protected $model;

    public function __construct(Produto $produto)
    {
        $this->model = new Repository($produto);
    }

    /**
     * Display a listing of the resource.
     *
     * @return ProdutosResource
     */
    public function index(): ProdutosResource
    {
        return new ProdutosResource($this->model->all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ProdutoCreateRequest $request
     * @return ProdutoResource
     */
    public function store(ProdutoCreateRequest $request): ProdutoResource
    {
        $produto = $this->model->create($request->all());
        return new ProdutoResource($produto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProdutoResource
     */
    public function show($id): ProdutoResource
    {
        return new ProdutoResource($this->model->find($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param ProdutoCreateRequest $request
     * @param  int $id
     * @return ProdutoResource
     */
    public function update(ProdutoCreateRequest $request, $id): ProdutoResource
    {
        $produto = $this->model->find($id);
        $produto->update($request->all());
        return new ProdutoResource($produto);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function delete($id)
    {
        $produto = $this->model->find($id);
        $produto->delete();
        return response()->json(null, 204);
    }
}
