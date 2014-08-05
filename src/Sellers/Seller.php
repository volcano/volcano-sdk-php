<?php

namespace VolcanoSDK\Sellers;

class Seller extends \VolcanoSDK\Service
{
    const BASE_PATTERN = '/sellers';
    
    /**
     * Gets specific seller information.
     * 
     * @see https://github.com/volcano/billing/wiki/API#sellers
     * 
     */
    public function get($id)
    {
        return $this->call(static::BASE_PATTERN . "/{$id}");
    }
}