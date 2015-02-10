<?php

require_once 'src/Router.php';
require_once 'src/Service.php';

\VolcanoSDK\Service::baseUrl('https://billing-c9-cthos.c9.io');

var_dump(\VolcanoSDK\Service::getService('seller')->get(1));
var_dump(\VolcanoSDK\Service::getService('seller')->listContact(1));
var_dump(\VolcanoSDK\Service::getService('seller')->getContact(1, 1));
