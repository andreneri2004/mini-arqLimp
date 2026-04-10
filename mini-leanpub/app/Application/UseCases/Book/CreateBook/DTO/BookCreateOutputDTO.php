<?php

namespace Minileanpub\Application\UseCases\Book\CreateBook\DTO;

use Minileanpub\Application\UseCases\Shared\InteractorDTO;

class BookCreateOutputDTO extends InteractorDTO
{
    public function __construct(
        public ?string $id,
        public ?string $title,
        public ?string $description = null,
        public ?string $price = null,
        public ?string $bookPath = null,
        public ?string $mimeType = null
    ) {}
}
