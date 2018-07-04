<?php

namespace App\Http\Controllers\Produto;

use App\Http\Requests\ProdutoCreateRequest;
use App\Services\Produto\Contracts\CreateContract;
use App\Services\Produto\Contracts\ShowContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController
{
    protected $service;

    public function __construct(ShowContract $service)
    {
        $this->service = $service;
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        $headerAccept = $request->headers->get("accept");
        if("application/xml" == $headerAccept) {
            return response()->xml($this->service->handle($request));
        }
        return response()->json($this->service->handle($request));
    }
}