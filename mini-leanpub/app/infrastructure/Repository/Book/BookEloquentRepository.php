<?php

namespace Minileanpub\infrastructure\Repository\Book;

use App\Models\Book;
use Minileanpub\Domain\Book\Repository\BookRepositoryInterface;

class BookEloquentRepository implements BookRepositoryInterface
{
    //depois aqui
    public function __construct(private Book $model)
    {}

    //Começa por aqui, respeitar a interface, não o model.
    public function create($data)
    {
        $this->model->create($data);
    }
}
