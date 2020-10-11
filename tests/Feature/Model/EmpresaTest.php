<?php

namespace Tests\Feature\Model;

use Tests\TestCase;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmpresaTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        /** @var Empresa $empresa */
        $empresa = factory(Empresa::class)->create([
                        'name' => 'SLZTelecom',
                        'urlimage' => 'imagem/slztelecom.png'
        ]);
        $this->assertCount(1, Empresa::all());
        
        $fields = array_keys($empresa->getAttributes());

        $this->assertEquals([
            'name',
            'urlimage',
            'updated_at',
            'created_at',
            'id'
        ], $fields );

        $this->assertDatabaseHas('empresas', ['name' => 'SLZTelecom']);
    }
}
