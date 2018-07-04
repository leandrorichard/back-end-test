<?php

namespace App\Services\Produto\Contracts;


use Illuminate\Http\Request;

interface IndexContract
{
    public function handle(Request $request): array;
}