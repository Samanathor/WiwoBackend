<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Postulacion;

class PostulacionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_postulacion()
    {
        $postulacion = factory(Postulacion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/postulaciones', $postulacion
        );

        $this->assertApiResponse($postulacion);
    }

    /**
     * @test
     */
    public function test_read_postulacion()
    {
        $postulacion = factory(Postulacion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/postulaciones/'.$postulacion->id
        );

        $this->assertApiResponse($postulacion->toArray());
    }

    /**
     * @test
     */
    public function test_update_postulacion()
    {
        $postulacion = factory(Postulacion::class)->create();
        $editedPostulacion = factory(Postulacion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/postulaciones/'.$postulacion->id,
            $editedPostulacion
        );

        $this->assertApiResponse($editedPostulacion);
    }

    /**
     * @test
     */
    public function test_delete_postulacion()
    {
        $postulacion = factory(Postulacion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/postulaciones/'.$postulacion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/postulaciones/'.$postulacion->id
        );

        $this->response->assertStatus(404);
    }
}
