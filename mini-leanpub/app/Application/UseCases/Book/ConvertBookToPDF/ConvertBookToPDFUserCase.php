<?php

namespace MiniLeanpub\Application\UseCases\Book\ConvertBookToPDF;

use MiniLeanpub\Application\UseCases\Book\ConvertBookToPDF\DTO\ConvertBookToPDFInputDTO;
use MiniLeanpub\Application\UseCases\Book\ConvertBookToPDF\DTO\ConvertBookToPDFOutputDTO;
use MiniLeanpub\Domain\Shared\Queue\QueueInterface;
use Minileanpub\Domain\Book\Repository\Book\BookRepositoryInterface;

class ConvertBookToPDFUserCase
{
    public function __construct(
        private ConvertBookToPDFInputDTO $input,
        private BookRepositoryInterface $repository,
        private QueueInterface $queue
    )
    {
    }

    public function handle(): ConvertBookToPDFOutputDTO
    {
        $book = $this->repository->find($this->input->getData()['bookCode']);

        $this->queue->sendToQueue();

        //storage/app/books/uuid-v4/cha

        return new ConvertBookToPDFOutputDTO($book->book_code);
    }
}