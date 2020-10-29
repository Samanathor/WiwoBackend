<?php namespace Tests\Repositories;

use App\Models\Favorito;
use App\Repositories\FavoritoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FavoritoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FavoritoRepository
     */
    protected $favoritoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->favoritoRepo = \App::make(FavoritoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_favorito()
    {
        $favorito = factory(Favorito::class)->make()->toArray();

        $createdFavorito = $this->favoritoRepo->create($favorito);

        $createdFavorito = $createdFavorito->toArray();
        $this->assertArrayHasKey('id', $createdFavorito);
        $this->assertNotNull($createdFavorito['id'], 'Created Favorito must have id specified');
        $this->assertNotNull(Favorito::find($createdFavorito['id']), 'Favorito with given id must be in DB');
        $this->assertModelData($favorito, $createdFavorito);
    }

    /**
     * @test read
     */
    public function test_read_favorito()
    {
        $favorito = factory(Favorito::class)->create();

        $dbFavorito = $this->favoritoRepo->find($favorito->id);

        $dbFavorito = $dbFavorito->toArray();
        $this->assertModelData($favorito->toArray(), $dbFavorito);
    }

    /**
     * @test update
     */
    public function test_update_favorito()
    {
        $favorito = factory(Favorito::class)->create();
        $fakeFavorito = factory(Favorito::class)->make()->toArray();

        $updatedFavorito = $this->favoritoRepo->update($fakeFavorito, $favorito->id);

        $this->assertModelData($fakeFavorito, $updatedFavorito->toArray());
        $dbFavorito = $this->favoritoRepo->find($favorito->id);
        $this->assertModelData($fakeFavorito, $dbFavorito->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_favorito()
    {
        $favorito = factory(Favorito::class)->create();

        $resp = $this->favoritoRepo->delete($favorito->id);

        $this->assertTrue($resp);
        $this->assertNull(Favorito::find($favorito->id), 'Favorito should not exist in DB');
    }
}
