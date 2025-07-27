<?php
namespace App\Services;

use GuzzleHttp\Client;

class CamaraApiService
{
    protected $client;
    protected $baseUri = 'https://dadosabertos.camara.leg.br/api/v2/';

    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->baseUri]);
    }

    public function getDeputados()
    {
        $response = $this->client->get('deputados');
        return json_decode($response->getBody()->getContents(), true)['dados'];
    }

    public function getDespesas($deputadoId, $ano = null)
    {
        $params = array_filter(['ano' => $ano]);
        $response = $this->client->get("deputados/{$deputadoId}/despesas", ['query' => $params]);
        return json_decode($response->getBody()->getContents(), true)['dados'];
    }
}ak
