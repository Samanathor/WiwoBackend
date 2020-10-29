<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Referencia;

class ReferenciaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_referencia()
    {
        $referencia = factory(Referencia::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/referencias', $referencia
        );

        $this->assertApiResponse($referencia);
    }

    /**
     * @test
     */
    public function test_read_referencia()
    {
        $referencia = factory(Referencia::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/referencias/'.$referencia->id
        );

        $this->assertApiResponse($referencia->toArray());
    }

    /**
     * @test
     */
    public function test_update_referencia()
    {
        $referencia = factory(Referencia::class)->create();
        $editedReferencia = factory(Referencia::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/referencias/'.$referencia->id,
            $editedReferencia
        );

        $this->assertApiResponse($editedReferencia);
    }

    /**
     * @test
     */
    public function test_delete_referencia()
    {
        $referencia = factory(Referencia::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/referencias/'.$referencia->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/referencias/'.$referencia->id
        );

        $this->response->assertStatus(404);
    }
}
