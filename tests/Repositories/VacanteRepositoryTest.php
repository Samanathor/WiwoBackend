<?php namespace Tests\Repositories;

use App\Models\Vacante;
use App\Repositories\VacanteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VacanteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VacanteRepository
     */
    protected $vacanteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vacanteRepo = \App::make(VacanteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vacante()
    {
        $vacante = factory(Vacante::class)->make()->toArray();

        $createdVacante = $this->vacanteRepo->create($vacante);

        $createdVacante = $createdVacante->toArray();
        $this->assertArrayHasKey('id', $createdVacante);
        $this->assertNotNull($createdVacante['id'], 'Created Vacante must have id specified');
        $this->assertNotNull(Vacante::find($createdVacante['id']), 'Vacante with given id must be in DB');
        $this->assertModelData($vacante, $createdVacante);
    }

    /**
     * @test read
     */
    public function test_read_vacante()
    {
        $vacante = factory(Vacante::class)->create();

        $dbVacante = $this->vacanteRepo->find($vacante->id);

        $dbVacante = $dbVacante->toArray();
        $this->assertModelData($vacante->toArray(), $dbVacante);
    }

    /**
     * @test update
     */
    public function test_update_vacante()
    {
        $vacante = factory(Vacante::class)->create();
        $fakeVacante = factory(Vacante::class)->make()->toArray();

        $updatedVacante = $this->vacanteRepo->update($fakeVacante, $vacante->id);

        $this->assertModelData($fakeVacante, $updatedVacante->toArray());
        $dbVacante = $this->vacanteRepo->find($vacante->id);
        $this->assertModelData($fakeVacante, $dbVacante->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vacante()
    {
        $vacante = factory(Vacante::class)->create();

        $resp = $this->vacanteRepo->delete($vacante->id);

        $this->assertTrue($resp);
        $this->assertNull(Vacante::find($vacante->id), 'Vacante should not exist in DB');
    }
}
