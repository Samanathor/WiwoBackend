<?php namespace Tests\Repositories;

use App\Models\Estudio;
use App\Repositories\EstudioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EstudioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstudioRepository
     */
    protected $estudioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estudioRepo = \App::make(EstudioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_estudio()
    {
        $estudio = factory(Estudio::class)->make()->toArray();

        $createdEstudio = $this->estudioRepo->create($estudio);

        $createdEstudio = $createdEstudio->toArray();
        $this->assertArrayHasKey('id', $createdEstudio);
        $this->assertNotNull($createdEstudio['id'], 'Created Estudio must have id specified');
        $this->assertNotNull(Estudio::find($createdEstudio['id']), 'Estudio with given id must be in DB');
        $this->assertModelData($estudio, $createdEstudio);
    }

    /**
     * @test read
     */
    public function test_read_estudio()
    {
        $estudio = factory(Estudio::class)->create();

        $dbEstudio = $this->estudioRepo->find($estudio->id);

        $dbEstudio = $dbEstudio->toArray();
        $this->assertModelData($estudio->toArray(), $dbEstudio);
    }

    /**
     * @test update
     */
    public function test_update_estudio()
    {
        $estudio = factory(Estudio::class)->create();
        $fakeEstudio = factory(Estudio::class)->make()->toArray();

        $updatedEstudio = $this->estudioRepo->update($fakeEstudio, $estudio->id);

        $this->assertModelData($fakeEstudio, $updatedEstudio->toArray());
        $dbEstudio = $this->estudioRepo->find($estudio->id);
        $this->assertModelData($fakeEstudio, $dbEstudio->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_estudio()
    {
        $estudio = factory(Estudio::class)->create();

        $resp = $this->estudioRepo->delete($estudio->id);

        $this->assertTrue($resp);
        $this->assertNull(Estudio::find($estudio->id), 'Estudio should not exist in DB');
    }
}
