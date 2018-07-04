<?php

namespace App\Repositories;


use Illuminate\Http\Request;

interface RepositoryContract
{
    public function all();

    public function allByName(Request $request);

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);

    public function find(int $id);
}