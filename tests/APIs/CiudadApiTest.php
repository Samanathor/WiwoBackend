<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ciudad;

class CiudadApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ciudad()
    {
        $ciudad = factory(Ciudad::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ciudades', $ciudad
        );

        $this->assertApiResponse($ciudad);
    }

    /**
     * @test
     */
    public function test_read_ciudad()
    {
        $ciudad = factory(Ciudad::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/ciudades/'.$ciudad->id
        );

        $this->assertApiResponse($ciudad->toArray());
    }

    /**
     * @test
     */
    public function test_update_ciudad()
    {
        $ciudad = factory(Ciudad::class)->create();
        $editedCiudad = factory(Ciudad::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ciudades/'.$ciudad->id,
            $editedCiudad
        );

        $this->assertApiResponse($editedCiudad);
    }

    /**
     * @test
     */
    public function test_delete_ciudad()
    {
        $ciudad = factory(Ciudad::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ciudades/'.$ciudad->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ciudades/'.$ciudad->id
        );

        $this->response->assertStatus(404);
    }
}
