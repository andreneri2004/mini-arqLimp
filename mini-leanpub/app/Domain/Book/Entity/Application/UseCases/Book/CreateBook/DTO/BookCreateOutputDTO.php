<?php

namespace Minileanpub\Domain\Book\Entity\Application\UseCases\Book\CreateBook\DTO;

use Minileanpub\Domain\Book\Entity\Application\UseCases\Shared\InteractorDTO;

class BookCreateOutputDTO extends InteractorDTO
{
    public function __construct(
        public ?string $id = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?float $price = null,
        public ?string $bookPath = null,
        public ?string $mimeType = null
    ) {}
}
