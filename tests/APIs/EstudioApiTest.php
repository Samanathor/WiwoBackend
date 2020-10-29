<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Estudio;

class EstudioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_estudio()
    {
        $estudio = factory(Estudio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/estudios', $estudio
        );

        $this->assertApiResponse($estudio);
    }

    /**
     * @test
     */
    public function test_read_estudio()
    {
        $estudio = factory(Estudio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/estudios/'.$estudio->id
        );

        $this->assertApiResponse($estudio->toArray());
    }

    /**
     * @test
     */
    public function test_update_estudio()
    {
        $estudio = factory(Estudio::class)->create();
        $editedEstudio = factory(Estudio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/estudios/'.$estudio->id,
            $editedEstudio
        );

        $this->assertApiResponse($editedEstudio);
    }

    /**
     * @test
     */
    public function test_delete_estudio()
    {
        $estudio = factory(Estudio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/estudios/'.$estudio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/estudios/'.$estudio->id
        );

        $this->response->assertStatus(404);
    }
}
