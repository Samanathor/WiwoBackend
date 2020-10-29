<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Vacante;

class VacanteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vacante()
    {
        $vacante = factory(Vacante::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vacantes', $vacante
        );

        $this->assertApiResponse($vacante);
    }

    /**
     * @test
     */
    public function test_read_vacante()
    {
        $vacante = factory(Vacante::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vacantes/'.$vacante->id
        );

        $this->assertApiResponse($vacante->toArray());
    }

    /**
     * @test
     */
    public function test_update_vacante()
    {
        $vacante = factory(Vacante::class)->create();
        $editedVacante = factory(Vacante::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vacantes/'.$vacante->id,
            $editedVacante
        );

        $this->assertApiResponse($editedVacante);
    }

    /**
     * @test
     */
    public function test_delete_vacante()
    {
        $vacante = factory(Vacante::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vacantes/'.$vacante->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vacantes/'.$vacante->id
        );

        $this->response->assertStatus(404);
    }
}
