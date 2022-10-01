<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Post;

class CommentRepository implements Interfaces\CommentRepositoryInterface
{
    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        $post = Post::find($data['post_id']);
        $post->comments()->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
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
