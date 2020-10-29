<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Plan;

class PlanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_plan()
    {
        $plan = factory(Plan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/planes', $plan
        );

        $this->assertApiResponse($plan);
    }

    /**
     * @test
     */
    public function test_read_plan()
    {
        $plan = factory(Plan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/planes/'.$plan->id
        );

        $this->assertApiResponse($plan->toArray());
    }

    /**
     * @test
     */
    public function test_update_plan()
    {
        $plan = factory(Plan::class)->create();
        $editedPlan = factory(Plan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/planes/'.$plan->id,
            $editedPlan
        );

        $this->assertApiResponse($editedPlan);
    }

    /**
     * @test
     */
    public function test_delete_plan()
    {
        $plan = factory(Plan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/planes/'.$plan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/planes/'.$plan->id
        );

        $this->response->assertStatus(404);
    }
}
