<?php

namespace CurrencyExchange;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\HttpClient;

class CurrencyExchangeApi
{
    private HttpClientInterface $client;
    private string $apiKey;
    private string $apiUrl = "http://api.exchangeratesapi.io/v1/latest?access_key=";

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = HttpClient::create();
    }

    public function fetchExchangeData(): ExchangeRates
    {
        $client = $this->client->request("GET", $this->apiUrl . $this->apiKey);

        $request = $client->toArray();

        return new ExchangeRates($request["rates"]);
    }
}