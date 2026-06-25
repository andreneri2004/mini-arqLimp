<?php

namespace Tests\Minileanpub\Unit\Application\UseCases\Book\CreateBook;

use App\Models\Book;
use Minileanpub\Application\UseCases\Book\CreateBook\CreateBookUseCase;
use Minileanpub\Application\UseCases\Book\CreateBook\DTO\{BookCreateInputDTO, BookCreateOutputDTO};
use Minileanpub\infrastructure\Repository\Book\BookEloquentRepository;


use PHPUnit\Framework\TestCase;

class CreateBookUseCaseTest extends TestCase
{
    public function test_should_create_a_new_book_via_use_case()
    {
   
        $repository = $this->getRepositortyMock();
 
        $input = new BookCreateInputDTO(
            '64b25e92-39f5-48df-8b74-19a302450f5c',
            'Meu Livro',
            'Meu livro desc',
            25.9,
            'book_path',
            'text/markdown'
        );

  
        $useCase = new CreateBookUseCase($input, $repository);

        $result = $useCase->handle(); 

        $this->assertInstanceOf(BookCreateOutputDTO::class, $result);


        $data = $result->getData();

        $this->assertEquals('64b25e92-39f5-48df-8b74-19a302450f5c', $data['id']);
        $this->assertEquals('Meu Livro', $data['title']);
    }

    private function getRepositortyMock()
    {
        $return = new \stdClass;
        $return->id = '64b25e92-39f5-48df-8b74-19a302450f5c';
        $return->title = 'Meu Livro';
        $return->description = 'Meu livro desc';
        $return->price = 25.9;
        $return->bookPath = 'path_book';
        $return->mimeType = 'text/markdown';
        
        $model = $this->createMock(Book::class);

        $mock = $this->getMockBuilder(BookEloquentRepository::class)
            ->onlyMethods(['create'])
            ->setConstructorArgs([$model])
            ->getMock();


        $mock->expects($this->once())
            ->method('create')
            ->willReturn($return);

        return $mock;
    }
}
