volcano-sdk-php
===============

PHP SDK for VolcanoCRM

## Purpose
The attempt here is to make a simple to use PHP SDK for @volcano.

## Example

```php
\VolcanoSDK\Service::baseUrl('https://volcano');
\VolcanoSDK\Service::apiKey('notMyRealKey');

var_dump(\VolcanoSDK\Service::getService('Seller')->get(1));
var_dump(\VolcanoSDK\Service::getService('Seller')->listContacts(1));
var_dump(\VolcanoSDK\Service::getService('Seller')->getContact(1, 1));

```