<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Membro;
use App\Models\Igreja;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MembroControllerTest extends TestCase
{
    use RefreshDatabase; 

    public function listar_membros()
    {
        Membro::factory()->count(3)->create(); 

        $response = $this->get(route('membros.index'));

        $response->assertStatus(200);
        $response->assertSee('Lista de Membros');
    }

   
    public function criar_membro()
    {
        $igreja = Igreja::factory()->create();

        $dados = [
            'nome' => 'Gabriel Goettenauer',
            'cpf' => '12345678999',
            'data_nascimento' => '2001-09-01',
            'email' => 'gabriel1@email.com',
            'telefone' => '73999999999',
            'estado' => 'RJ',
            'cidade' => 'Rio de Janeiro',
            'igreja_id' => $igreja->id
        ];

        $response = $this->post(route('membros.store'), $dados);

        $response->assertRedirect(route('membros.index'));
        $this->assertDatabaseHas('membros', ['nome' => 'João Silva']);
    }

   
    public function editar_membro()
    {
        $membro = Membro::factory()->create();

        $novosDados = ['nome' => 'Isa'];

        $response = $this->put(route('membros.update', $membro->id), $novosDados);

        $response->assertRedirect(route('membros.index'));
        $this->assertDatabaseHas('membros', ['nome' => 'Isa']);
    }

  
    public function deletar_membro()
    {
        $membro = Membro::factory()->create();

        $response = $this->delete(route('membros.destroy', $membro->id));

        $response->assertRedirect(route('membros.index'));
        $this->assertDatabaseMissing('membros', ['id' => $membro->id]);
    }
}
