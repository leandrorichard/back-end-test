<?php

namespace App\Services\Produto\Contracts;


use Illuminate\Http\Request;

interface ShowContract
{
    public function handle(Request $request);
}