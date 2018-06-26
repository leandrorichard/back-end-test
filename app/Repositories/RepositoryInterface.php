<?php
/**
 * Created by PhpStorm.
 * User: leandrorichard
 * Date: 26/06/18
 * Time: 01:55
 */

namespace App\Repositories;


interface RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);

    public function find(int $id);
}