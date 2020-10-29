<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Perfil;

class PerfilApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_perfil()
    {
        $perfil = factory(Perfil::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/perfiles', $perfil
        );

        $this->assertApiResponse($perfil);
    }

    /**
     * @test
     */
    public function test_read_perfil()
    {
        $perfil = factory(Perfil::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/perfiles/'.$perfil->id
        );

        $this->assertApiResponse($perfil->toArray());
    }

    /**
     * @test
     */
    public function test_update_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $editedPerfil = factory(Perfil::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/perfiles/'.$perfil->id,
            $editedPerfil
        );

        $this->assertApiResponse($editedPerfil);
    }

    /**
     * @test
     */
    public function test_delete_perfil()
    {
        $perfil = factory(Perfil::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/perfiles/'.$perfil->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/perfiles/'.$perfil->id
        );

        $this->response->assertStatus(404);
    }
}
