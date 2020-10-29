<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Mensaje;

class MensajeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_mensaje()
    {
        $mensaje = factory(Mensaje::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/mensajes', $mensaje
        );

        $this->assertApiResponse($mensaje);
    }

    /**
     * @test
     */
    public function test_read_mensaje()
    {
        $mensaje = factory(Mensaje::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/mensajes/'.$mensaje->id
        );

        $this->assertApiResponse($mensaje->toArray());
    }

    /**
     * @test
     */
    public function test_update_mensaje()
    {
        $mensaje = factory(Mensaje::class)->create();
        $editedMensaje = factory(Mensaje::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/mensajes/'.$mensaje->id,
            $editedMensaje
        );

        $this->assertApiResponse($editedMensaje);
    }

    /**
     * @test
     */
    public function test_delete_mensaje()
    {
        $mensaje = factory(Mensaje::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/mensajes/'.$mensaje->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/mensajes/'.$mensaje->id
        );

        $this->response->assertStatus(404);
    }
}
