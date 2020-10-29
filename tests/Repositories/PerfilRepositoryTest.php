<?php namespace Tests\Repositories;

use App\Models\Perfil;
use App\Repositories\PerfilRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PerfilRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PerfilRepository
     */
    protected $perfilRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->perfilRepo = \App::make(PerfilRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_perfil()
    {
        $perfil = factory(Perfil::class)->make()->toArray();

        $createdPerfil = $this->perfilRepo->create($perfil);

        $createdPerfil = $createdPerfil->toArray();
        $this->assertArrayHasKey('id', $createdPerfil);
        $this->assertNotNull($createdPerfil['id'], 'Created Perfil must have id specified');
        $this->assertNotNull(Perfil::find($createdPerfil['id']), 'Perfil with given id must be in DB');
        $this->assertModelData($perfil, $createdPerfil);
    }

    /**
     * @test read
     */
    public function test_read_perfil()
    {
        $perfil = factory(Perfil::class)->create();

        $dbPerfil = $this->perfilRepo->find($perfil->id);

        $dbPerfil = $dbPerfil->toArray();
        $this->assertModelData($perfil->toArray(), $dbPerfil);
    }

    /**
     * @test update
     */
    public function test_update_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $fakePerfil = factory(Perfil::class)->make()->toArray();

        $updatedPerfil = $this->perfilRepo->update($fakePerfil, $perfil->id);

        $this->assertModelData($fakePerfil, $updatedPerfil->toArray());
        $dbPerfil = $this->perfilRepo->find($perfil->id);
        $this->assertModelData($fakePerfil, $dbPerfil->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_perfil()
    {
        $perfil = factory(Perfil::class)->create();

        $resp = $this->perfilRepo->delete($perfil->id);

        $this->assertTrue($resp);
        $this->assertNull(Perfil::find($perfil->id), 'Perfil should not exist in DB');
    }
}
