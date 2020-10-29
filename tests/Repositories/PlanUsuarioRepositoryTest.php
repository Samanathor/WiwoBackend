<?php namespace Tests\Repositories;

use App\Models\PlanUsuario;
use App\Repositories\PlanUsuarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PlanUsuarioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PlanUsuarioRepository
     */
    protected $planUsuarioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->planUsuarioRepo = \App::make(PlanUsuarioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->make()->toArray();

        $createdPlanUsuario = $this->planUsuarioRepo->create($planUsuario);

        $createdPlanUsuario = $createdPlanUsuario->toArray();
        $this->assertArrayHasKey('id', $createdPlanUsuario);
        $this->assertNotNull($createdPlanUsuario['id'], 'Created PlanUsuario must have id specified');
        $this->assertNotNull(PlanUsuario::find($createdPlanUsuario['id']), 'PlanUsuario with given id must be in DB');
        $this->assertModelData($planUsuario, $createdPlanUsuario);
    }

    /**
     * @test read
     */
    public function test_read_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->create();

        $dbPlanUsuario = $this->planUsuarioRepo->find($planUsuario->id);

        $dbPlanUsuario = $dbPlanUsuario->toArray();
        $this->assertModelData($planUsuario->toArray(), $dbPlanUsuario);
    }

    /**
     * @test update
     */
    public function test_update_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->create();
        $fakePlanUsuario = factory(PlanUsuario::class)->make()->toArray();

        $updatedPlanUsuario = $this->planUsuarioRepo->update($fakePlanUsuario, $planUsuario->id);

        $this->assertModelData($fakePlanUsuario, $updatedPlanUsuario->toArray());
        $dbPlanUsuario = $this->planUsuarioRepo->find($planUsuario->id);
        $this->assertModelData($fakePlanUsuario, $dbPlanUsuario->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_plan_usuario()
    {
        $planUsuario = factory(PlanUsuario::class)->create();

        $resp = $this->planUsuarioRepo->delete($planUsuario->id);

        $this->assertTrue($resp);
        $this->assertNull(PlanUsuario::find($planUsuario->id), 'PlanUsuario should not exist in DB');
    }
}
