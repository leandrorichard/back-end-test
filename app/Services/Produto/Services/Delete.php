<?php

namespace App\Services\Produto\Services;

use App\Produto;
use App\Services\Produto\Contracts\DeleteContract;
use Illuminate\Http\Request;

class Delete implements DeleteContract
{
    protected $model;

    public function __construct(Produto $produto)
    {
        $this->model = $produto;
    }

    public function handle(Request $request)
    {
        try {
            if ($id = $request->route("produto")) {
                $produto = $this->model->find($id);
                $produto->delete($produto);
            }
        } catch (\Exception $e) {
            throw new $e;
        }
    }
}