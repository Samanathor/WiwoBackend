<?php namespace Tests\Repositories;

use App\Models\Subcategoria;
use App\Repositories\SubcategoriaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubcategoriaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubcategoriaRepository
     */
    protected $subcategoriaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subcategoriaRepo = \App::make(SubcategoriaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->make()->toArray();

        $createdSubcategoria = $this->subcategoriaRepo->create($subcategoria);

        $createdSubcategoria = $createdSubcategoria->toArray();
        $this->assertArrayHasKey('id', $createdSubcategoria);
        $this->assertNotNull($createdSubcategoria['id'], 'Created Subcategoria must have id specified');
        $this->assertNotNull(Subcategoria::find($createdSubcategoria['id']), 'Subcategoria with given id must be in DB');
        $this->assertModelData($subcategoria, $createdSubcategoria);
    }

    /**
     * @test read
     */
    public function test_read_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->create();

        $dbSubcategoria = $this->subcategoriaRepo->find($subcategoria->id);

        $dbSubcategoria = $dbSubcategoria->toArray();
        $this->assertModelData($subcategoria->toArray(), $dbSubcategoria);
    }

    /**
     * @test update
     */
    public function test_update_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->create();
        $fakeSubcategoria = factory(Subcategoria::class)->make()->toArray();

        $updatedSubcategoria = $this->subcategoriaRepo->update($fakeSubcategoria, $subcategoria->id);

        $this->assertModelData($fakeSubcategoria, $updatedSubcategoria->toArray());
        $dbSubcategoria = $this->subcategoriaRepo->find($subcategoria->id);
        $this->assertModelData($fakeSubcategoria, $dbSubcategoria->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_subcategoria()
    {
        $subcategoria = factory(Subcategoria::class)->create();

        $resp = $this->subcategoriaRepo->delete($subcategoria->id);

        $this->assertTrue($resp);
        $this->assertNull(Subcategoria::find($subcategoria->id), 'Subcategoria should not exist in DB');
    }
}
