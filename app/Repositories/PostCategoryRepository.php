<?php

namespace App\Repositories;

use App\Models\PostCategory;
use App\Repositories\Interfaces\PostCategoryInterface;

class PostCategoryRepository implements PostCategoryInterface
{
    protected $model;

    public function __construct(PostCategory $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $postCategory = $this->model->find($id);
        return $postCategory->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
