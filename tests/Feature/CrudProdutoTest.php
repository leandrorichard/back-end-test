<?php

namespace Tests\Feature;

use App\Produto;
use Tests\TestCase;

class CrudProdutoTest extends TestCase
{
    const METHOD_POST   = "POST";
    const METHOD_PUT    = "PUT";
    const METHOD_DELETE = "DELETE";
    const METHOD_GET    = "GET";

    const API_URL = "/api/v1/produto";

    public function testProdutoCreated()
    {
        $endpoint = self::API_URL;
        $data = array(
            "nome" => "Console PlayStation 4, Preto",
            "sku" => "D279CXX617",
            "peso" => 3.58,
            "altura" => 10.2,
            "largura" => 35.00,
            "profundidade" => 29.8,
            "valor" => 2246.60
        );
        $dataAssert = array(
            "id" => 3,
            "nome" => "Console PlayStation 4, Preto",
            "sku" => "D279CXX617",
            "valor" => 2246.60,
        );
        $headers = array(
            "Content-Type" => "application/json",
            "Accept" => "application/json",

        );

        $response = $this->json(self::METHOD_POST, $endpoint, $data, $headers);
        $response->assertStatus(201);
        $response->assertJson($dataAssert);
    }

    public function testProdutoUpdated()
    {
        $endpoint = self::API_URL;
        $headers = array(
            "Content-Type" => "application/json",
            "Accept" => "application/json",
        );

        $dataUpdate = array(
            "nome" => "Console PlayStation 1, Branco",
            "sku" => "D279CXX617",
            "peso" => 3.58,
            "altura" => 10.2,
            "largura" => 35.00,
            "profundidade" => 29.8,
            "valor" => 2326.60
        );
        $produto = Produto::create(array(
            "nome" => "Console PlayStation 1, Preto",
            "sku" => "D279CXX617",
            "peso" => 3.58,
            "altura" => 10.2,
            "largura" => 35.00,
            "profundidade" => 29.8,
            "valor" => 2246.60
        ));
        $dataAssert = array(
            "id" => $produto->id,
            "nome" => "Console PlayStation 1, Branco",
            "sku" => "D279CXX617",
            "valor" => 2326.60
        );

        $response = $this->json(self::METHOD_PUT, "{$endpoint}/{$produto->id}", $dataUpdate, $headers);
        $response->assertStatus(200);
        $response->assertJson($dataAssert);
    }

    public function testProdutoDeleted()
    {
        $endpoint = self::API_URL."/1";
        $data = array();
        $headers = array(
            "Content-Type" => "application/json",
            "Accept" => "application/json",
        );

        $response = $this->json(self::METHOD_DELETE, $endpoint, $data, $headers);
        $response->assertStatus(204);
    }

    public function testProdutoListed()
    {
        $endpoint = self::API_URL;
        $data = array();
        $headers = array(
            "Content-Type" => "application/json",
            "Accept" => "application/json",
        );
        $jsonStructure = array(
//            array("*" =>
                array(
                    "id",
                    "nome",
                    "sku",
                    "valor",
                )
//            )
        );

        $response = $this->json(self::METHOD_GET, $endpoint, $data, $headers);

        $response->assertStatus(200)
                 ->assertJsonStructure($jsonStructure);
    }
}
