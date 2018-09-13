<?php

require_once __DIR__ . '/vendor/autoload.php';

$pagos360 = new \Pagos360\Pagos360(
    'NDgzY2U1ZGU5NzNiZjRkMGM0Mjg4NmMwYzI5MmQ5MWQ1MmJjOGQwMDgzYTgwM2Y1ZjNmODg1NWM5ZWJmNWYyYg',
//    'blablalba',
    'https://api.pagos360.com'
);

$verification = new \Pagos360\Model\PaymentRequest();
$verification
    ->setDescription('Descripción del usuario')
    ->setExternalReference('REF123')
    ->setFirstDueDate('01-12-2018')
    ->setFirstTotal(345.34)
//    ->setSecondDueDate('12-12-2018')
//    ->setSecondTotal(1992.22)
    ->setPayerName('Jorge Armani')
    ->setPayerEmail('jorge.armani@gmail.com')
;

try {
    $verification = $pagos360->createPaymentRequest($verification);
    var_dump($verification->getProperties()['id']);
} catch (\Pagos360\Exception\Pagos360InvalidApiKeyException $e) {
    echo $e->getMessage();
    die("\n");
} catch (\Pagos360\Exception\Pagos360Exception $e) {
    echo $e->getMessage();
//    echo $e->getTraceAsString();
    die("\n");
}
