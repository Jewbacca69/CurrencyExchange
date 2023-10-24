<?php

namespace CurrencyExchange;

class CurrencyConverter
{
    private CurrencyExchangeApi $exchangeApi;

    public function __construct(CurrencyExchangeApi $exchangeApi)
    {
        $this->exchangeApi = $exchangeApi;
    }

    public function convertCurrency(int $amount, string $currencyFrom, string $currencyTo) : ?string
    {
        $fetchData = $this->exchangeApi->fetchExchangeData();

        if($fetchData->isRateSet($currencyFrom) && $fetchData->isRateSet($currencyTo))
        {
            $convertedAmount = $amount * ($fetchData->getRates($currencyTo) / $fetchData->getRates($currencyFrom));

            return number_format($convertedAmount, 2, '.', '');
        }

        return null;
    }
}