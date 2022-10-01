<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository implements AdminRepositoryInterface
{
    protected $model;

    public function __construct(Admin $model)
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
        $record = $this->model->find($id);
        return $record->update($data);
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
