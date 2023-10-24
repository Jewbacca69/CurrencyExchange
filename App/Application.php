<?php

namespace CurrencyExchange;

class Application
{
    private string $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function run()
    {
        $exchangeApi = new CurrencyExchangeApi($this->apiKey);
        $converter = new CurrencyConverter($exchangeApi);

        $inputStr = readline("Enter the amount and currency to exchange (Example: 2 EUR) : ");

        if (empty($inputStr)) {
            echo "Input is required.\n";
            exit();
        }

        list($amount, $fromCurrency) = explode(' ', $inputStr);

        $toCurrency = readline("Enter the currency to which you want to convert: ");

        $amount = (float)$amount;
        $convertedAmount = $converter->convertCurrency($amount, $fromCurrency, $toCurrency);

        if ($convertedAmount !== null) {
            echo "$amount $fromCurrency is equal to $convertedAmount $toCurrency" . PHP_EOL;
        } else {
            echo "Invalid exchange rates.";
        }
    }
}