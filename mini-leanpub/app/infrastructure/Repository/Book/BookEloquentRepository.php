<?php

namespace Minileanpub\Infrastructure\Repository\Book;

use App\Models\Book;
use Minileanpub\Domain\Book\Repository\Book\BookRepositoryInterface;

class BookEloquentRepository implements BookRepositoryInterface
{
    public function __construct(private Book $model)
    {}

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($bookCode){
        return $this->model->whereBookCode()->first();
    }
}
