<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Favorito;

class FavoritoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_favorito()
    {
        $favorito = factory(Favorito::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/favoritos', $favorito
        );

        $this->assertApiResponse($favorito);
    }

    /**
     * @test
     */
    public function test_read_favorito()
    {
        $favorito = factory(Favorito::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/favoritos/'.$favorito->id
        );

        $this->assertApiResponse($favorito->toArray());
    }

    /**
     * @test
     */
    public function test_update_favorito()
    {
        $favorito = factory(Favorito::class)->create();
        $editedFavorito = factory(Favorito::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/favoritos/'.$favorito->id,
            $editedFavorito
        );

        $this->assertApiResponse($editedFavorito);
    }

    /**
     * @test
     */
    public function test_delete_favorito()
    {
        $favorito = factory(Favorito::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/favoritos/'.$favorito->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/favoritos/'.$favorito->id
        );

        $this->response->assertStatus(404);
    }
}
