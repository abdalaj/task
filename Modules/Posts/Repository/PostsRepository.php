<?php

namespace Modules\Posts\Repository;

use Modules\Posts\App\Models\Posts;
use Modules\Posts\Interfaces\PostsInterface;

class PostsRepository implements PostsInterface
{
    public $model;
    public function __construct(Posts $model)
    {
        $this->model = $model;
    }
    public function create(array $data): Posts
    {
        return $this->model->query()->create($data);
    }
    public function delete(string $id): bool
    {
        return $this->model->query()->find($id)->delete();
    }
    public function edit(array $data, string $id): bool
    {
        return $this->model->query()->find($id)->update($data);
    }
}
