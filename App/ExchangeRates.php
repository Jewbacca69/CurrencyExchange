<?php

namespace CurrencyExchange;

class ExchangeRates
{
    private array $rates;

    public function __construct(array $rates)
    {
        $this->rates = $rates;
    }

    public function getRates($currency): float
    {
        return $this->rates[$currency];
    }

    public function isRateSet($currency): bool
    {
        return isset($this->rates[$currency]);
    }
}