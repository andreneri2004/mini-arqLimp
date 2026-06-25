<?php

namespace Minileanpub\Application\UseCases\Book\CreateBook;

use Minileanpub\Domain\Book\Entity\Book;

use Minileanpub\Application\UseCases\Book\CreateBook\DTO\{BookCreateInputDTO, BookCreateOutputDTO};

use Minileanpub\Domain\Book\Repository\Book\BookRepositoryInterface;

class CreateBookUseCase
{
    public function __construct(private BookCreateInputDTO $input, private BookRepositoryInterface $repository) {}


    public function handle(): BookCreateOutputDTO
    {
        $data = $this->input->getData();

        $entity = new Book(
            $data['id'],
            $data['title'],
            $data['description'],
            $data['price'],
            $data['bookPath'],
            $data['mimeType']
        );

        $entity->validate();

        $result = $this->repository->create($data);

        return new BookCreateOutputDTO($result->id, $result->title, $result->description);
    }
}
