<?php

namespace Modules\Posts\Interfaces;

use Modules\Posts\App\Models\Posts;

interface PostsInterface
{
    public function create(array $data): Posts;
    public function edit(array $data, string $id): bool;
    public function delete(string $id): bool;
}
