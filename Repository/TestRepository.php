<?php

namespace App\Repository;

use App\Contracts\TestRepositoryInterface;
use App\Models\Test;

class TestRepository implements TestRepositoryInterface
{
    public function all()
    {
        return Test::all();
    }

    public function find(int $id)
    {
        return Test::findOrFail($id);
    }

    public function create(array $data)
    {
        return Test::create($data);
    }

    public function update(int $id, array $data)
    {
        $post = $this->find($id);
        $post->update($data);
        return $post;
    }

    public function delete(int $id)
    {
        $post = $this->find($id);
        $post->delete();
    }
}
