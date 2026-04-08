<?php

namespace Tests\MiniLeanpub\Unit\Domain\Book\Entity;

use MiniLeanpub\Domain\Book\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function test_if_book_validation_throws_exception_to_an_invalid_id()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid Entity: ID');

        $book = new Book(null, 'Titulo Livro', 'Descrição Livro', 25.9, 'path_book', 'mime_type');

        $book->validate();
    }

    public function test_if_book_validation_throws_exception_to_an_invalid_title_or_description()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Title or Description');

        $book = new Book('UUID', null, 'Descrição Livro', 25.9, 'path_book', 'text/markdown');

        $book->validate();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Title or Description');

        $book = new Book('UUID', 'Titulo Livro', null, 25.9, 'path_book', 'text/markdown');

        $book->validate();
    }

    public function test_if_book_validation_throws_exception_to_an_invalid_price()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Price');

        $book = new Book('UUID', 'Titulo Livro', 'Descrição Livro', -10, 'path_book', 'text/markdown');

        $book->validate();
    }

    public function test_if_book_validation_throws_exception_to_an_invalid_book_path()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid Entity: Path Book');

        $book = new Book('UUID', 'Titulo Livro', 'Descrição Livro', 25.9, null, 'text/markdown');

        $book->validate();
    }

    public function test_if_book_validation_throws_exception_to_a_valid_book_mime_type()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid Entity: MimeType');

        $book = new Book('UUID', 'Titulo Livro', 'Descrição Livro', 25.9, 'book_path', 'application/json');

        $book->validate();
    }
}
