<?php

require_once 'src/Service.php';
require_once 'src/Sellers/Seller.php';

$seller = new \VolcanoSDK\Sellers\Seller;

$seller->baseUrl('https://billing-c9-cthos.c9.io/api');

var_dump($seller->get(1));
var_dump($seller->getContacts());