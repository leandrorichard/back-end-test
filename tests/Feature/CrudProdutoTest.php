<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrudProdutoTest extends TestCase
{
    public function testProdutoListed()
    {
        $method = "GET";
        $endpoint = "/api/produto";
        $data = array();
        $headers = array(
            "Content-Type" => "application/json"
        );
        $jsonStructure = array("*" =>
            array(
                "id",
                "nome",
                "sku",
                "peso",
                "altura",
                "largura",
                "profundidade",
                "valor",
                "created_at",
                "updated_at"
            )
        );

        $response = $this->json($method, $endpoint, $data, $headers);

        $response->assertStatus(200)
                 ->assertJsonStructure($jsonStructure);
    }
}
