<?php

return array(
    'Seller' => array(
        'get'         => array(
            'path'   => 'sellers/{1}',
            'method' => 'GET',
        ),
        'create'      => array(
            'path'   => 'sellers',
            'method' => 'POST',
        ),
        'update'      => array(
            'path'   => 'sellers/{1}',
            'method' => 'PUT',
        ),
        'listContacts' => array(
            'path'   => 'sellers/{1}/contacts',
            'method' => 'GET',
        ),
        'getContact' => array(
            'path'   => 'sellers/{1}/contacts/{2}',
            'method' => 'GET',
        ),
        'createContact' => array(
            'path'   => 'sellers/{1}/contacts',
            'method' => 'POST',
        ),
        'updateContact' => array(
            'path'   => 'sellers/{1}/contacts/{2}',
            'method' => 'PUT',
        ),
        'deleteContact' => array(
            'path'   => 'sellers/{1}/contacts/{2}',
            'method' => 'DELETE',
        ),
        'listGateways' => array(
            'path'   => 'sellers/{1}/gateways',
            'method' => 'GET',
        ),
        'getGateway' => array(
            'path'   => 'sellers/{1}/gateways/{2}',
            'method' => 'GET',
        ),
        'createGateway' => array(
            'path'   => 'sellers/{1}/gateways',
            'method' => 'POST',
        ),
        'updateGateway' => array(
            'path'   => 'sellers/{1}/gateways/{2}',
            'method' => 'PUT',
        ),
        'deleteGateway' => array(
            'path'   => 'sellers/{1}/gateways/{2}',
            'method' => 'DELETE',
        ),
        'listCallbacks' => array(
            'path'   => 'sellers/{1}/callbacks',
            'method' => 'GET',
        ),
        'getCallback' => array(
            'path'   => 'sellers/{1}/callbacks/{2}',
            'method' => 'GET',
        ),
        'createCallback' => array(
            'path'   => 'sellers/{1}/callbacks',
            'method' => 'POST',
        ),
        'updateCallback' => array(
            'path'   => 'sellers/{1}/callbacks/{2}',
            'method' => 'PUT',
        ),
        'deleteCallback' => array(
            'path'   => 'sellers/{1}/callbacks/{2}',
            'method' => 'DELETE',
        ),
    ),
    'Product' => array(
        'list' => array(
            'path'   => 'products',
            'method' => 'GET',
        ),
        'get' => array(
            'path'   => 'products/{1}',
            'method' => 'GET',
        ),
        'create' => array(
            'path'   => 'products/{1}',
            'method' => 'POST',
        ),
        'update' => array(
            'path'   => 'products/{1}',
            'method' => 'PUT',
        ),
        'delete' => array(
            'path'   => 'products/{1}',
            'method' => 'DELETE',
        ),
        'listOptions' => array(
            'path'   => 'products/{1}/options',
            'method' => 'GET',
        ),
        'getOption' => array(
            'path'   => 'products/{1}/options/{2}',
            'method' => 'GET',
        ),
        'createOption' => array(
            'path'   => 'products/{1}/options',
            'method' => 'POST',
        ),
        'updateOption' => array(
            'path'   => 'products/{1}/options/{2}',
            'method' => 'PUT',
        ),
        'deleteOption' => array(
            'path'   => 'products/{1}/options',
            'method' => 'DELETE',
        ),
        'listOptionFees' => array(
            'path'   => 'products/{1}/options/{2}/fees',
            'method' => 'GET',
        ),
        'getOptionFee' => array(
            'path'   => 'products/{1}/options/{2}/fees/{3}',
            'method' => 'GET',
        ),
        'createOptionFee' => array(
            'path'   => 'products/{1}/options/{2}/fees',
            'method' => 'POST',
        ),
        'updateOptionFee' => array(
            'path'   => 'products/{1}/options/{2}/fees/{3}',
            'method' => 'PUT',
        ),
        'deleteOptionFee' => array(
            'path'   => 'products/{1}/options{2}/fees',
            'method' => 'DELETE',
        ),
    ),
    'Contact' => array(
        'list' => array(
            'path'   => 'customers',
            'method' => 'GET',
        ),
        'get' => array(
            'path'   => 'customers/{1}',
            'method' => 'GET',
        ),
        'create' => array(
            'path'   => 'customers/{1}',
            'method' => 'POST',
        ),
        'update' => array(
            'path'   => 'customers/{1}',
            'method' => 'PUT',
        ),
        'delete' => array(
            'path'   => 'customers/{1}',
            'method' => 'DELETE',
        ),
        'listContacts' => array(
            'path'   => 'customers/{1}/contacts',
            'method' => 'GET',
        ),
        'getContact' => array(
            'path'   => 'customers/{1}/contacts/{2}',
            'method' => 'GET',
        ),
        'createContact' => array(
            'path'   => 'customers/{1}/contacts',
            'method' => 'POST',
        ),
        'updateContact' => array(
            'path'   => 'customers/{1}/contacts/{2}',
            'method' => 'PUT',
        ),
        'deleteContact' => array(
            'path'   => 'customers/{1}/contacts/{2}',
            'method' => 'DELETE',
        ),
        'listOrders' => array(
            'path'   => 'customers/{1}/orders',
            'method' => 'GET',
        ),
        'getOrder' => array(
            'path'   => 'customers/{1}/orders/{2}',
            'method' => 'GET',
        ),
        'createOrder' => array(
            'path'   => 'customers/{1}/orders',
            'method' => 'POST',
        ),
        'listTransactions' => array(
            'path'   => 'customers/{1}/transactions',
            'method' => 'GET',
        ),
        'getTransaction' => array(
            'path'   => 'customers/{1}/transactions/{2}',
            'method' => 'GET',
        ),
        'listPaymentMethods' => array(
            'path'   => 'customers/{1}/paymentmethods',
            'method' => 'GET',
        ),
        'getPaymentMethod' => array(
            'path'   => 'customers/{1}/paymentmethods/{2}',
            'method' => 'GET',
        ),
        'createPaymentMethod' => array(
            'path'   => 'customers/{1}/paymentmethods',
            'method' => 'POST',
        ),
        'updatePaymentMethod' => array(
            'path'   => 'customers/{1}/paymentmethods/{2}',
            'method' => 'PUT',
        ),
        'deletePaymentMethod' => array(
            'path'   => 'customers/{1}/paymentmethods/{2}',
            'method' => 'DELETE',
        ),
    ),
);