<?php

namespace Tests\Feature;

use App\Produto;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrudProdutoTest extends TestCase
{
    const METHOD_POST   = "POST";
    const METHOD_PUT    = "PUT";
    const METHOD_DELETE = "DELETE";
    const METHOD_GET    = "GET";

    const API_URL = "/api/produto";

    public function testProdutoCreated()
    {
        $endpoint = self::API_URL;
        $data = array(
            'nome' => 'Console PlayStation 4, Preto',
            'sku' => 'D279CXX617',
            'peso' => 3.58,
            'altura' => 10.2,
            'largura' => 35.00,
            'profundidade' => 29.8,
            'valor' => 2246.60
        );
        $headers = array(
            "Content-Type" => "application/json"
        );

        $response = $this->json(self::METHOD_POST, $endpoint, $data, $headers);
        $response->assertStatus(201);
        $response->assertJson($data);
    }

    public function testProdutoUpdated()
    {
        $endpoint = self::API_URL;
        $data = array(
            'nome' => 'Console PlayStation 2, Preto'
        );
        $headers = array(
            "Content-Type" => "application/json"
        );

        $produto = Produto::create(array(
            'nome' => 'Console PlayStation 4, Preto',
            'sku' => 'D279CXX617',
            'peso' => 3.58,
            'altura' => 10.2,
            'largura' => 35.00,
            'profundidade' => 29.8,
            'valor' => 2246.60
        ));

        $response = $this->json(self::METHOD_PUT, "{$endpoint}/{$produto->id}", $data, $headers);
        $response->assertStatus(200);
        $response->assertJson($data);
    }

    public function testProdutoDeleted()
    {
        $endpoint = self::API_URL."/1";
        $data = array();
        $headers = array(
            "Content-Type" => "application/json"
        );

        $response = $this->json(self::METHOD_DELETE, $endpoint, $data, $headers);
        $response->assertStatus(204);
    }

    public function testProdutoListed()
    {
        $endpoint = self::API_URL;
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

        $response = $this->json(self::METHOD_GET, $endpoint, $data, $headers);

        $response->assertStatus(200)
                 ->assertJsonStructure($jsonStructure);
    }
}
