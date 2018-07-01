<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoCreateRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Produto;
use App\Repositories\Repository;

use App\Services\Produto\Create as CreateService;
use App\Services\Produto\Index as IndexService;
use App\Services\Produto\Show as ShowService;
use App\Services\Produto\Update as UpdateService;
use App\Services\Produto\Delete as DeleteService;

class ProdutoController extends Controller
{
    protected $model;
    protected $createService;
    protected $indexService;
    protected $showService;
    protected $updateService;
    protected $deleteService;

    public function __construct(Produto $produto, IndexService $indexService, CreateService $createService,
                                ShowService $showService, UpdateService $updateService, DeleteService $deleteService)
    {
        $this->model = new Repository($produto);
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
            return response()->xml($this->createService->handle($request));
        }
        return response()->json($this->createService->handle($request));

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
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        $headerAccept = $request->headers->get("accept");
        $this->deleteService->handle($request);
        if ("application/xml" == $headerAccept) {
            return response()->xml(null, 204);
        }
        return response()->json(null, 204);
    }
}
