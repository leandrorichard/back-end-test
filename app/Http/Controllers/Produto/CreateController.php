<?php

namespace App\Http\Controllers\Produto;

use App\Http\Requests\ProdutoCreateRequest;
use App\Services\Produto\Contracts\CreateContract;
use Symfony\Component\HttpFoundation\Response;

class CreateController
{
    protected $service;

    public function __construct(CreateContract $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProdutoCreateRequest $request
     * @return Response
     */
    public function store(ProdutoCreateRequest $request): Response
    {
        $headerAccept = $request->headers->get("accept");
        if("application/xml" == $headerAccept) {
            return response()->xml($this->service->handle($request), 201);
        }
        return response()->json($this->service->handle($request), 201);

    }
}