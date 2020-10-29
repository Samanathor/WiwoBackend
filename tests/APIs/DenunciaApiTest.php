<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Denuncia;

class DenunciaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_denuncia()
    {
        $denuncia = factory(Denuncia::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/denuncias', $denuncia
        );

        $this->assertApiResponse($denuncia);
    }

    /**
     * @test
     */
    public function test_read_denuncia()
    {
        $denuncia = factory(Denuncia::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/denuncias/'.$denuncia->id
        );

        $this->assertApiResponse($denuncia->toArray());
    }

    /**
     * @test
     */
    public function test_update_denuncia()
    {
        $denuncia = factory(Denuncia::class)->create();
        $editedDenuncia = factory(Denuncia::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/denuncias/'.$denuncia->id,
            $editedDenuncia
        );

        $this->assertApiResponse($editedDenuncia);
    }

    /**
     * @test
     */
    public function test_delete_denuncia()
    {
        $denuncia = factory(Denuncia::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/denuncias/'.$denuncia->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/denuncias/'.$denuncia->id
        );

        $this->response->assertStatus(404);
    }
}
