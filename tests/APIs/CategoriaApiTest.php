<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Categoria;

class CategoriaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_categoria()
    {
        $categoria = factory(Categoria::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/categorias', $categoria
        );

        $this->assertApiResponse($categoria);
    }

    /**
     * @test
     */
    public function test_read_categoria()
    {
        $categoria = factory(Categoria::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/categorias/'.$categoria->id
        );

        $this->assertApiResponse($categoria->toArray());
    }

    /**
     * @test
     */
    public function test_update_categoria()
    {
        $categoria = factory(Categoria::class)->create();
        $editedCategoria = factory(Categoria::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/categorias/'.$categoria->id,
            $editedCategoria
        );

        $this->assertApiResponse($editedCategoria);
    }

    /**
     * @test
     */
    public function test_delete_categoria()
    {
        $categoria = factory(Categoria::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/categorias/'.$categoria->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/categorias/'.$categoria->id
        );

        $this->response->assertStatus(404);
    }
}
