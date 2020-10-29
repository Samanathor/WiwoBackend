<?php namespace Tests\Repositories;

use App\Models\Ciudad;
use App\Repositories\CiudadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CiudadRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CiudadRepository
     */
    protected $ciudadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ciudadRepo = \App::make(CiudadRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ciudad()
    {
        $ciudad = factory(Ciudad::class)->make()->toArray();

        $createdCiudad = $this->ciudadRepo->create($ciudad);

        $createdCiudad = $createdCiudad->toArray();
        $this->assertArrayHasKey('id', $createdCiudad);
        $this->assertNotNull($createdCiudad['id'], 'Created Ciudad must have id specified');
        $this->assertNotNull(Ciudad::find($createdCiudad['id']), 'Ciudad with given id must be in DB');
        $this->assertModelData($ciudad, $createdCiudad);
    }

    /**
     * @test read
     */
    public function test_read_ciudad()
    {
        $ciudad = factory(Ciudad::class)->create();

        $dbCiudad = $this->ciudadRepo->find($ciudad->id);

        $dbCiudad = $dbCiudad->toArray();
        $this->assertModelData($ciudad->toArray(), $dbCiudad);
    }

    /**
     * @test update
     */
    public function test_update_ciudad()
    {
        $ciudad = factory(Ciudad::class)->create();
        $fakeCiudad = factory(Ciudad::class)->make()->toArray();

        $updatedCiudad = $this->ciudadRepo->update($fakeCiudad, $ciudad->id);

        $this->assertModelData($fakeCiudad, $updatedCiudad->toArray());
        $dbCiudad = $this->ciudadRepo->find($ciudad->id);
        $this->assertModelData($fakeCiudad, $dbCiudad->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ciudad()
    {
        $ciudad = factory(Ciudad::class)->create();

        $resp = $this->ciudadRepo->delete($ciudad->id);

        $this->assertTrue($resp);
        $this->assertNull(Ciudad::find($ciudad->id), 'Ciudad should not exist in DB');
    }
}
