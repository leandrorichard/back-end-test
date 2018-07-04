<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoCreateRequest;
use App\Services\Produto\Contracts\CreateContract as CreateContract;
use App\Services\Produto\Contracts\DeleteContract as DeleteContract;
use App\Services\Produto\Contracts\IndexContract as IndexContract;
use App\Services\Produto\Contracts\ShowContract as ShowContract;
use App\Services\Produto\Contracts\UpdateContract as UpdateContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdutoController extends Controller
{
    protected $createService;
    protected $indexService;
    protected $showService;
    protected $updateService;
    protected $deleteService;

    public function __construct(IndexContract $indexService, CreateContract $createService,
                                ShowContract $showService, UpdateContract $updateService, DeleteContract $deleteService)
    {
        $this->createService = $createService;
        $this->indexService = $indexService;
        $this->showService = $showService;
        $this->updateService = $updateService;
        $this->deleteService = $deleteService;
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
            return response()->xml($this->indexService->handle($request));
        }
        return response()->json($this->indexService->handle($request));

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
            return response()->xml($this->createService->handle($request), 201);
        }
        return response()->json($this->createService->handle($request), 201);

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
            return response()->xml($this->showService->handle($request));
        }
        return response()->json($this->showService->handle($request));
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
            return response()->xml($this->updateService->handle($request));
        }
        return response()->json($this->updateService->handle($request));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request): Response
    {
        $headerAccept = $request->headers->get("accept");
        $this->deleteService->handle($request);
        if ("application/xml" == $headerAccept) {
            return response()->xml(null, 204);
        }
        return response()->json(null, 204);
    }
}
