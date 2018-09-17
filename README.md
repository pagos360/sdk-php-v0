# Pagos360.com SDK PHP

A PHP library to manage payments through the Pagos360.com API.

You can sign up for a Pagos360.com account at https://www.pagos360.com/solicitar-cuenta

## Requirements

PHP 5.6 and later.

## Composer

You can install the SDK via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require pagos360/sdk-php
```

To use the SDK, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Dependencies

The SDK require the following extensions in order to work properly:

- [`curl`](https://secure.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer
- [`json`](https://secure.php.net/manual/en/book.json.php)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Getting Started

Simple usage looks like:

* Create a instance of the Pagos360 Client (with a API KEY)

```php
$pagos360 = new \Pagos360\Pagos360(
    'NTI1ZDc1Njc0YzZiNDk0YTIyNDZhMGQyNTOmM2M5OTc0ZTQ0NTMxMGJlNDRkNGEwZTJhZWI4ZTU1OTdlNDk0O1',
    'https://api.pagos360.com'
);
```

* Start making API calls (e.g. create a Payment Request)

```php
$paymentRequest = new \Pagos360\Model\PaymentRequest();
$paymentRequest
    ->setDescription('Bill nº 3345')
    ->setExternalReference('REF123')
    ->setFirstDueDate('01-12-2018')
    ->setFirstTotal(345.34)
    ->setSecondDueDate('12-12-2018')
    ->setSecondTotal(1992.22)
    ->setPayerName('John Doe')
    ->setPayerEmail('john.doe@pagos360.com')
    ->setBackUrlSucess('https://example.com/payment/success')
    ->setBackUrlPending('https://example.com/payment/pending')
;

try {
    $paymentRequest = $pagos360->createPaymentRequest($paymentRequest);
    var_dump($paymentRequest->getFirstDueDate());
    var_dump($paymentRequest->getFirstTotal());
    var_dump($paymentRequest->getPayerName());
    var_dump($paymentRequest->getPayerEmail());
} catch (\Pagos360\Exception\Pagos360UnauthorizedException $e) {
    var_dump($e->getMessage());
    die("\n");
} catch (\Pagos360\Exception\Pagos360BadRequestException $e) {
    var_dump($e->getErrorResponse());
    die("\n");
}
```

* Retrieve a Payment Request by id

```php
try {
    $paymentRequest = $pagos360->retrievePaymentRequest(193410);
    var_dump($paymentRequest->getFirstTotal());
    var_dump($paymentRequest->getFirstDueDate());
    var_dump($paymentRequest->getDescription());
    var_dump($paymentRequest->getPayerEmail());
    var_dump($paymentRequest->getPayerName());
} catch (\Pagos360\Exception\Pagos360UnauthorizedException $e) {
    var_dump($e->getMessage());
    die("\n");
} catch (\Pagos360\Exception\Pagos360BadRequestException $e) {
    var_dump($e->getMessage());
    var_dump($e->getErrorResponse());
    die("\n");
} catch (\Pagos360\Exception\Pagos360NotFoundException $e) {
    var_dump($e->getMessage());
    die("\n");
}
```
