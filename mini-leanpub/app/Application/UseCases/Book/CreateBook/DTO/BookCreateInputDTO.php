<?php

namespace Minileanpub\Application\UseCases\Book\CreateBook\DTO;

use Minileanpub\Application\UseCases\Shared\InteractorDTO;

class BookCreateInputDTO extends InteractorDTO
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $price,
        public string $bookPath,
        public string $mimeType
    ) {}
}
