<?php namespace Tests\Repositories;

use App\Models\Mensaje;
use App\Repositories\MensajeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MensajeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MensajeRepository
     */
    protected $mensajeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->mensajeRepo = \App::make(MensajeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_mensaje()
    {
        $mensaje = factory(Mensaje::class)->make()->toArray();

        $createdMensaje = $this->mensajeRepo->create($mensaje);

        $createdMensaje = $createdMensaje->toArray();
        $this->assertArrayHasKey('id', $createdMensaje);
        $this->assertNotNull($createdMensaje['id'], 'Created Mensaje must have id specified');
        $this->assertNotNull(Mensaje::find($createdMensaje['id']), 'Mensaje with given id must be in DB');
        $this->assertModelData($mensaje, $createdMensaje);
    }

    /**
     * @test read
     */
    public function test_read_mensaje()
    {
        $mensaje = factory(Mensaje::class)->create();

        $dbMensaje = $this->mensajeRepo->find($mensaje->id);

        $dbMensaje = $dbMensaje->toArray();
        $this->assertModelData($mensaje->toArray(), $dbMensaje);
    }

    /**
     * @test update
     */
    public function test_update_mensaje()
    {
        $mensaje = factory(Mensaje::class)->create();
        $fakeMensaje = factory(Mensaje::class)->make()->toArray();

        $updatedMensaje = $this->mensajeRepo->update($fakeMensaje, $mensaje->id);

        $this->assertModelData($fakeMensaje, $updatedMensaje->toArray());
        $dbMensaje = $this->mensajeRepo->find($mensaje->id);
        $this->assertModelData($fakeMensaje, $dbMensaje->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_mensaje()
    {
        $mensaje = factory(Mensaje::class)->create();

        $resp = $this->mensajeRepo->delete($mensaje->id);

        $this->assertTrue($resp);
        $this->assertNull(Mensaje::find($mensaje->id), 'Mensaje should not exist in DB');
    }
}
