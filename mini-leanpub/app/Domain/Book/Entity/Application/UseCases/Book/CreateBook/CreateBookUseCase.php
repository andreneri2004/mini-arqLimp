<?php

namespace Minileanpub\Domain\Book\Entity\Application\UseCases\Book\CreateBook;

use Minileanpub\Domain\Book\Entity\Book;
use Minileanpub\Domain\Book\Entity\Application\UseCases\Book\CreateBook\DTO\{BookCreateInputDTO, BookCreateOutputDTO};
use Minileanpub\Domain\Book\Repository\BookRepositoryInterface;

class CreateBookUseCase
{
    public function __construct(private BookCreateInputDTO $input, private BookRepositoryInterface $repository) {}

    public function handle(): BookCreateOutputDTO
    {
        $data = $this->input->getData();

        // entidade para validar regra de negocio, não é validação de formulário...
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

        return new BookCreateOutputDTO($result->id, $result->title);
    }
}
