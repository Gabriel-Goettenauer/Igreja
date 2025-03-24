<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Igreja;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IgrejaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function listar_igrejas()
    {
        Igreja::factory()->count(3)->create();

        $response = $this->get(route('igrejas.index'));

        $response->assertStatus(200);
        $response->assertSee('Lista de Igrejas');
    }

    public function criar_igreja()
    {
        $dados = ['nome' => 'Igreja Teste'];

        $response = $this->post(route('igrejas.store'), $dados);

        $response->assertRedirect(route('igrejas.index'));
        $this->assertDatabaseHas('igrejas', ['nome' => 'Igreja Teste']);
    }

    public function editar_igreja()
    {
        $igreja = Igreja::factory()->create();

        $novosDados = ['nome' => 'Nova Igreja'];

        $response = $this->put(route('igrejas.update', $igreja->id), $novosDados);

        $response->assertRedirect(route('igrejas.index'));
        $this->assertDatabaseHas('igrejas', ['nome' => 'Nova Igreja']);
    }

    public function deletar_igreja()
    {
        $igreja = Igreja::factory()->create();

        $response = $this->delete(route('igrejas.destroy', $igreja->id));

        $response->assertRedirect(route('igrejas.index'));
        $this->assertDatabaseMissing('igrejas', ['id' => $igreja->id]);
    }
}
