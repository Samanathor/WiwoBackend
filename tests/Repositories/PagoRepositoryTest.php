<?php namespace Tests\Repositories;

use App\Models\Pago;
use App\Repositories\PagoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PagoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PagoRepository
     */
    protected $pagoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pagoRepo = \App::make(PagoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pago()
    {
        $pago = factory(Pago::class)->make()->toArray();

        $createdPago = $this->pagoRepo->create($pago);

        $createdPago = $createdPago->toArray();
        $this->assertArrayHasKey('id', $createdPago);
        $this->assertNotNull($createdPago['id'], 'Created Pago must have id specified');
        $this->assertNotNull(Pago::find($createdPago['id']), 'Pago with given id must be in DB');
        $this->assertModelData($pago, $createdPago);
    }

    /**
     * @test read
     */
    public function test_read_pago()
    {
        $pago = factory(Pago::class)->create();

        $dbPago = $this->pagoRepo->find($pago->id);

        $dbPago = $dbPago->toArray();
        $this->assertModelData($pago->toArray(), $dbPago);
    }

    /**
     * @test update
     */
    public function test_update_pago()
    {
        $pago = factory(Pago::class)->create();
        $fakePago = factory(Pago::class)->make()->toArray();

        $updatedPago = $this->pagoRepo->update($fakePago, $pago->id);

        $this->assertModelData($fakePago, $updatedPago->toArray());
        $dbPago = $this->pagoRepo->find($pago->id);
        $this->assertModelData($fakePago, $dbPago->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pago()
    {
        $pago = factory(Pago::class)->create();

        $resp = $this->pagoRepo->delete($pago->id);

        $this->assertTrue($resp);
        $this->assertNull(Pago::find($pago->id), 'Pago should not exist in DB');
    }
}
