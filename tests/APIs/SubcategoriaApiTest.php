<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Subcategoria;

class SubcategoriaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/subcategorias', $subcategoria
        );

        $this->assertApiResponse($subcategoria);
    }

    /**
     * @test
     */
    public function test_read_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/subcategorias/'.$subcategoria->id
        );

        $this->assertApiResponse($subcategoria->toArray());
    }

    /**
     * @test
     */
    public function test_update_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->create();
        $editedSubcategoria = factory(Subcategoria::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/subcategorias/'.$subcategoria->id,
            $editedSubcategoria
        );

        $this->assertApiResponse($editedSubcategoria);
    }

    /**
     * @test
     */
    public function test_delete_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/subcategorias/'.$subcategoria->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/subcategorias/'.$subcategoria->id
        );

        $this->response->assertStatus(404);
    }
}
