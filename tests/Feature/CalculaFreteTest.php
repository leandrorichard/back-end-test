<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CalculaFreteTest extends TestCase
{
    const METHOD_POST   = "POST";
    const METHOD_PUT    = "PUT";
    const METHOD_DELETE = "DELETE";
    const METHOD_GET    = "GET";

    const API_URL = "/api/v1/calculos/correios?pid=1&cep_origem=74911350&cep_destino=70690000";

    public function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testJson()
    {
        $endpoint = self::API_URL;
        $data = array();
        $headers = array(
            "Content-Type" => "application/json",
            "Accept" => "application/json",
        );
        $jsonStructure = array(
            array(
                "valor",
                "prazo"
            )
        );

        $response = $this->json(self::METHOD_GET, $endpoint, $data, $headers);

        $response->assertStatus(200);
    }
}
