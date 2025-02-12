<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Lista;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_ItGetAllProducts(): void
    {
        $products = Lista::factory()->create();
        $response = $this->getJson(route('listaAll'));
        $response ->assertStatus(200)
                  ->assertJsonCount(1);
    }
    public function test_ItCreateAProduct():void
        {
            $product = Lista::factory()->create();
            $response = $this->postJson(route('crearProducto'), [
                'product_name' => 'Arroz'
            ]);
            $response->assertStatus(201);
            $this->assertDatabaseHas('Lista', [
                'product_name' => 'Arroz'
            ]);
        }
    public function test_ItCanUpdateAProduct():void
    {
        $product = Lista::factory()->create();
        $response = $this->putJson(route('actualizarProducto', $product->id), [
            'product_name' => 'Carne'
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('Lista', [
            'product_name' => 'Carne'
        ]);
    }
    public function test_ItCanDeleteAProduct():void
    {
        $product = Lista::factory()->create();
        $response = $this->deleteJson(route('borrarProducto', $product->id));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('Lista', [
            'product_name' => $product->product_name
        ]);
    }
}
