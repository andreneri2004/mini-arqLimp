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
        //parte 2 - cenário planejado
        $repository = $this->getRepositortyMock();
        // 1
        $input = new BookCreateInputDTO(
            '64b25e92-39f5-48df-8b74-19a302450f5c',
            'Meu Livro',
            'Meu livro desc',
            25.9,
            'book_path',
            'text/markdown'
        );

        //COMEÇA AQUI O TESTE
        $useCase = new CreateBookUseCase($input, $repository);

        $result = $useCase->handle(); // ao execultar esse método..

        $this->assertInstanceOf(BookCreateOutputDTO::class, $result); // verifica isso.

        // Outro ponto planejado

        $data = $result->getData();

        $this->assertEquals('64b25e92-39f5-48df-8b74-19a302450f5c', $data['id']);
        $this->assertEquals('Meu Livro', $data['title']);
    }

    private function getRepositortyMock()
    {
        //classe generica para simular o retorno do banco de dados, não é o model, é a interface, mas como a interface tem o model, fack no model.
        $return = new \stdClass;
        $return->id = '64b25e92-39f5-48df-8b74-19a302450f5c';
        $return->title = 'Meu Livro';
        $return->description = 'Meu livro desc';
        $return->price = 25.9;
        $return->bookPath = 'path_book';
        $return->mimeType = 'text/markdown';
        
        $model = $this->createMock(Book::class); // Começa aqui ---fack no model, respeitar uma interface.

        $mock = $this->getMockBuilder(BookEloquentRepository::class)
            ->onlyMethods(['create'])
            ->setConstructorArgs([$model])
            ->getMock();

        // comportamento

        $mock->expects($this->once())
            ->method('create')
            ->willReturn($return);

        return $mock;
    }
}
