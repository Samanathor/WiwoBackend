<?php namespace Tests\Repositories;

use App\Models\Referencia;
use App\Repositories\ReferenciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ReferenciaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReferenciaRepository
     */
    protected $referenciaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->referenciaRepo = \App::make(ReferenciaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_referencia()
    {
        $referencia = factory(Referencia::class)->make()->toArray();

        $createdReferencia = $this->referenciaRepo->create($referencia);

        $createdReferencia = $createdReferencia->toArray();
        $this->assertArrayHasKey('id', $createdReferencia);
        $this->assertNotNull($createdReferencia['id'], 'Created Referencia must have id specified');
        $this->assertNotNull(Referencia::find($createdReferencia['id']), 'Referencia with given id must be in DB');
        $this->assertModelData($referencia, $createdReferencia);
    }

    /**
     * @test read
     */
    public function test_read_referencia()
    {
        $referencia = factory(Referencia::class)->create();

        $dbReferencia = $this->referenciaRepo->find($referencia->id);

        $dbReferencia = $dbReferencia->toArray();
        $this->assertModelData($referencia->toArray(), $dbReferencia);
    }

    /**
     * @test update
     */
    public function test_update_referencia()
    {
        $referencia = factory(Referencia::class)->create();
        $fakeReferencia = factory(Referencia::class)->make()->toArray();

        $updatedReferencia = $this->referenciaRepo->update($fakeReferencia, $referencia->id);

        $this->assertModelData($fakeReferencia, $updatedReferencia->toArray());
        $dbReferencia = $this->referenciaRepo->find($referencia->id);
        $this->assertModelData($fakeReferencia, $dbReferencia->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_referencia()
    {
        $referencia = factory(Referencia::class)->create();

        $resp = $this->referenciaRepo->delete($referencia->id);

        $this->assertTrue($resp);
        $this->assertNull(Referencia::find($referencia->id), 'Referencia should not exist in DB');
    }
}
