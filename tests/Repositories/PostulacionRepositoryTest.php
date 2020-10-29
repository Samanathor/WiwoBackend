<?php namespace Tests\Repositories;

use App\Models\Postulacion;
use App\Repositories\PostulacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PostulacionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PostulacionRepository
     */
    protected $postulacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->postulacionRepo = \App::make(PostulacionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_postulacion()
    {
        $postulacion = factory(Postulacion::class)->make()->toArray();

        $createdPostulacion = $this->postulacionRepo->create($postulacion);

        $createdPostulacion = $createdPostulacion->toArray();
        $this->assertArrayHasKey('id', $createdPostulacion);
        $this->assertNotNull($createdPostulacion['id'], 'Created Postulacion must have id specified');
        $this->assertNotNull(Postulacion::find($createdPostulacion['id']), 'Postulacion with given id must be in DB');
        $this->assertModelData($postulacion, $createdPostulacion);
    }

    /**
     * @test read
     */
    public function test_read_postulacion()
    {
        $postulacion = factory(Postulacion::class)->create();

        $dbPostulacion = $this->postulacionRepo->find($postulacion->id);

        $dbPostulacion = $dbPostulacion->toArray();
        $this->assertModelData($postulacion->toArray(), $dbPostulacion);
    }

    /**
     * @test update
     */
    public function test_update_postulacion()
    {
        $postulacion = factory(Postulacion::class)->create();
        $fakePostulacion = factory(Postulacion::class)->make()->toArray();

        $updatedPostulacion = $this->postulacionRepo->update($fakePostulacion, $postulacion->id);

        $this->assertModelData($fakePostulacion, $updatedPostulacion->toArray());
        $dbPostulacion = $this->postulacionRepo->find($postulacion->id);
        $this->assertModelData($fakePostulacion, $dbPostulacion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_postulacion()
    {
        $postulacion = factory(Postulacion::class)->create();

        $resp = $this->postulacionRepo->delete($postulacion->id);

        $this->assertTrue($resp);
        $this->assertNull(Postulacion::find($postulacion->id), 'Postulacion should not exist in DB');
    }
}
