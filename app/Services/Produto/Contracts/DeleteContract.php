<?php

namespace App\Services\Produto\Contracts;


use Illuminate\Http\Request;

interface DeleteContract
{
    public function handle(Request $request);
}