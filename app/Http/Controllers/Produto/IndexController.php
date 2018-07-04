<?php

namespace App\Http\Controllers\Produto;

use App\Services\Produto\Contracts\IndexContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    protected $service;

    public function __construct(IndexContract $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $headerAccept = $request->headers->get("accept");
        if("application/xml" == $headerAccept) {
            return response()->xml($this->service->handle($request));
        }
        return response()->json($this->service->handle($request));

    }
}