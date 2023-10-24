<?php

require_once "vendor/autoload.php";

use CurrencyExchange\Application;

$apiKey = "";

$app = new Application($apiKey);

$app->run();

