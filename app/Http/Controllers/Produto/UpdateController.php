<?php

namespace App\Http\Controllers\Produto;

use App\Http\Requests\ProdutoCreateRequest;
use App\Services\Produto\Contracts\UpdateContract;
use Symfony\Component\HttpFoundation\Response;

class UpdateController
{
    protected $service;

    public function __construct(UpdateContract $service)
    {
        $this->service = $service;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProdutoCreateRequest $request
     * @return Response
     */
    public function update(ProdutoCreateRequest $request): Response
    {
        $headerAccept = $request->headers->get("accept");
        if ("application/xml" == $headerAccept) {
            return response()->xml($this->service->handle($request));
        }
        return response()->json($this->service->handle($request));

    }
}