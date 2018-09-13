<?php

require_once __DIR__ . '/vendor/autoload.php';

$pagos360 = new \Pagos360\Pagos360('blabla');

$verification = new \Pagos360\Model\PaymentRequest();
$verification->setDescription('Descripción del usuario');

try {
    $verification = $pagos360->createPaymentRequest($verification);
    var_dump('PaymentRequest created', $verification);
} catch (\Pagos360\Exception\Pagos360Exception $e) {
    echo $e->getTraceAsString();
    die("\n");
}
