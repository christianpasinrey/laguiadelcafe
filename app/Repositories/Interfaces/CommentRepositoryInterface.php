<?php

namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface extends RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);

    public function with($relations);
}
