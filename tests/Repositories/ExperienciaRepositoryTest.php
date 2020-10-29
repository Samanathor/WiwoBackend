<?php namespace Tests\Repositories;

use App\Models\Experiencia;
use App\Repositories\ExperienciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ExperienciaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ExperienciaRepository
     */
    protected $experienciaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->experienciaRepo = \App::make(ExperienciaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_experiencia()
    {
        $experiencia = factory(Experiencia::class)->make()->toArray();

        $createdExperiencia = $this->experienciaRepo->create($experiencia);

        $createdExperiencia = $createdExperiencia->toArray();
        $this->assertArrayHasKey('id', $createdExperiencia);
        $this->assertNotNull($createdExperiencia['id'], 'Created Experiencia must have id specified');
        $this->assertNotNull(Experiencia::find($createdExperiencia['id']), 'Experiencia with given id must be in DB');
        $this->assertModelData($experiencia, $createdExperiencia);
    }

    /**
     * @test read
     */
    public function test_read_experiencia()
    {
        $experiencia = factory(Experiencia::class)->create();

        $dbExperiencia = $this->experienciaRepo->find($experiencia->id);

        $dbExperiencia = $dbExperiencia->toArray();
        $this->assertModelData($experiencia->toArray(), $dbExperiencia);
    }

    /**
     * @test update
     */
    public function test_update_experiencia()
    {
        $experiencia = factory(Experiencia::class)->create();
        $fakeExperiencia = factory(Experiencia::class)->make()->toArray();

        $updatedExperiencia = $this->experienciaRepo->update($fakeExperiencia, $experiencia->id);

        $this->assertModelData($fakeExperiencia, $updatedExperiencia->toArray());
        $dbExperiencia = $this->experienciaRepo->find($experiencia->id);
        $this->assertModelData($fakeExperiencia, $dbExperiencia->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_experiencia()
    {
        $experiencia = factory(Experiencia::class)->create();

        $resp = $this->experienciaRepo->delete($experiencia->id);

        $this->assertTrue($resp);
        $this->assertNull(Experiencia::find($experiencia->id), 'Experiencia should not exist in DB');
    }
}
