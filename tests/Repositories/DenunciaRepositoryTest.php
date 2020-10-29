<?php namespace Tests\Repositories;

use App\Models\Denuncia;
use App\Repositories\DenunciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DenunciaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DenunciaRepository
     */
    protected $denunciaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->denunciaRepo = \App::make(DenunciaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_denuncia()
    {
        $denuncia = factory(Denuncia::class)->make()->toArray();

        $createdDenuncia = $this->denunciaRepo->create($denuncia);

        $createdDenuncia = $createdDenuncia->toArray();
        $this->assertArrayHasKey('id', $createdDenuncia);
        $this->assertNotNull($createdDenuncia['id'], 'Created Denuncia must have id specified');
        $this->assertNotNull(Denuncia::find($createdDenuncia['id']), 'Denuncia with given id must be in DB');
        $this->assertModelData($denuncia, $createdDenuncia);
    }

    /**
     * @test read
     */
    public function test_read_denuncia()
    {
        $denuncia = factory(Denuncia::class)->create();

        $dbDenuncia = $this->denunciaRepo->find($denuncia->id);

        $dbDenuncia = $dbDenuncia->toArray();
        $this->assertModelData($denuncia->toArray(), $dbDenuncia);
    }

    /**
     * @test update
     */
    public function test_update_denuncia()
    {
        $denuncia = factory(Denuncia::class)->create();
        $fakeDenuncia = factory(Denuncia::class)->make()->toArray();

        $updatedDenuncia = $this->denunciaRepo->update($fakeDenuncia, $denuncia->id);

        $this->assertModelData($fakeDenuncia, $updatedDenuncia->toArray());
        $dbDenuncia = $this->denunciaRepo->find($denuncia->id);
        $this->assertModelData($fakeDenuncia, $dbDenuncia->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_denuncia()
    {
        $denuncia = factory(Denuncia::class)->create();

        $resp = $this->denunciaRepo->delete($denuncia->id);

        $this->assertTrue($resp);
        $this->assertNull(Denuncia::find($denuncia->id), 'Denuncia should not exist in DB');
    }
}
