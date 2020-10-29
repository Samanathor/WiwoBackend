<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Configuracion;

class ConfiguracionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_configuracion()
    {
        $configuracion = factory(Configuracion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/configuraciones', $configuracion
        );

        $this->assertApiResponse($configuracion);
    }

    /**
     * @test
     */
    public function test_read_configuracion()
    {
        $configuracion = factory(Configuracion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/configuraciones/'.$configuracion->id
        );

        $this->assertApiResponse($configuracion->toArray());
    }

    /**
     * @test
     */
    public function test_update_configuracion()
    {
        $configuracion = factory(Configuracion::class)->create();
        $editedConfiguracion = factory(Configuracion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/configuraciones/'.$configuracion->id,
            $editedConfiguracion
        );

        $this->assertApiResponse($editedConfiguracion);
    }

    /**
     * @test
     */
    public function test_delete_configuracion()
    {
        $configuracion = factory(Configuracion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/configuraciones/'.$configuracion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/configuraciones/'.$configuracion->id
        );

        $this->response->assertStatus(404);
    }
}
