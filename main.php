<?php

require_once "vendor/autoload.php";

use CurrencyExchange\Application;

$apiKey = "b9c9d212e5b1d72662c8e9150009e504";

$app = new Application($apiKey);

$app->run();

