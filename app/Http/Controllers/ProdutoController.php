<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Repositories\Repository;
use Illuminate\Http\Request;

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
     * @return Repository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return $this->model->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = $this->model->create($request->all());
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = $this->model->find($id);
        $produto->update($request->all());
        return response()->json($produto, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->model->find($id);
        $produto->delete();
        return response()->json(null, 204);
    }
}
