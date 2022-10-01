<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository implements Interfaces\PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $model)
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
        $post = $this->model->find($id);
        $post->update($data);

        return $post;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}
