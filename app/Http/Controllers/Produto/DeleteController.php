<?php

namespace App\Http\Controllers\Produto;

use App\Services\Produto\Contracts\DeleteContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteController
{
    protected $service;

    public function __construct(DeleteContract $service)
    {
        $this->service = $service;
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
        $this->service->handle($request);
        if ("application/xml" == $headerAccept) {
            return response()->xml(null, 204);
        }
        return response()->json(null, 204);
    }
}