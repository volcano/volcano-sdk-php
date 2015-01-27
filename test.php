<?php

require_once 'src/Router.php';
require_once 'src/Service.php';

\VolcanoSDK\Service::baseUrl('https://billing-c9-cthos.c9.io');

var_dump(\VolcanoSDK\Service::getService('Seller')->get(1));
var_dump(\VolcanoSDK\Service::getService('Seller')->listContacts(1));
var_dump(\VolcanoSDK\Service::getService('Seller')->getContact(1, 1));