<?php

namespace MiniLeanpub\Application\UseCases\Book\ConvertBookToPDF\DTO;

use Minileanpub\Application\UseCases\Shared\InteractorDTO;

class ConvertBookToPDFInputDTO extends InteractorDTO
{
    public function __construct(public string $bookCode) {}
}
