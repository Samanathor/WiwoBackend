<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PlanUsuario;

class PlanUsuarioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/planes_usuario', $planUsuario
        );

        $this->assertApiResponse($planUsuario);
    }

    /**
     * @test
     */
    public function test_read_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/planes_usuario/'.$planUsuario->id
        );

        $this->assertApiResponse($planUsuario->toArray());
    }

    /**
     * @test
     */
    public function test_update_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->create();
        $editedPlanUsuario = factory(PlanUsuario::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/planes_usuario/'.$planUsuario->id,
            $editedPlanUsuario
        );

        $this->assertApiResponse($editedPlanUsuario);
    }

    /**
     * @test
     */
    public function test_delete_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/planes_usuario/'.$planUsuario->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/planes_usuario/'.$planUsuario->id
        );

        $this->response->assertStatus(404);
    }
}
