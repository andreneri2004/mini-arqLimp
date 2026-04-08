<?php

namespace Minileanpub\infrastructure\Repository\Book;

use App\Models\Book;
use Minileanpub\Domain\Book\Repository\BookRepositoryInterface;

class BookEloquentRepository implements BookRepositoryInterface
{
    public function __construct(private Book $model)
    {}
    public function create($data)
    {
        $this->model->create($data);
    }
}
