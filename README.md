volcano-sdk-php
===============

PHP SDK for VolcanoCRM

## Purpose
The attempt here is to make a simple to use PHP SDK for @volcano.

## Example

```php
require_once 'src/Service.php';
require_once 'src/Sellers/Seller.php';

$seller = new \VolcanoSDK\Sellers\Seller;

$seller->baseUrl('https://volcano/api');
$seller->apiKey('notMyRealKey');

var_dump($seller->get(1));
```