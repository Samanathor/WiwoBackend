<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Experiencia;

class ExperienciaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_experiencia()
    {
        $experiencia = factory(Experiencia::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/experiencias', $experiencia
        );

        $this->assertApiResponse($experiencia);
    }

    /**
     * @test
     */
    public function test_read_experiencia()
    {
        $experiencia = factory(Experiencia::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/experiencias/'.$experiencia->id
        );

        $this->assertApiResponse($experiencia->toArray());
    }

    /**
     * @test
     */
    public function test_update_experiencia()
    {
        $experiencia = factory(Experiencia::class)->create();
        $editedExperiencia = factory(Experiencia::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/experiencias/'.$experiencia->id,
            $editedExperiencia
        );

        $this->assertApiResponse($editedExperiencia);
    }

    /**
     * @test
     */
    public function test_delete_experiencia()
    {
        $experiencia = factory(Experiencia::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/experiencias/'.$experiencia->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/experiencias/'.$experiencia->id
        );

        $this->response->assertStatus(404);
    }
}
