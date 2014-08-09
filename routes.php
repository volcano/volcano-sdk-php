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
    ),
);