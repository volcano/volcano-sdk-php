<?php

namespace VolcanoSDK\Sellers;

class Seller extends \VolcanoSDK\Service
{
    const BASE_PATTERN = '/sellers';
    
    protected $lastId;
    
    /**
     * Gets specific seller information.
     * 
     * @see https://github.com/volcano/billing/wiki/API#sellers
     * 
     * @param int $id
     *   Required - Seller Id
     * 
     * @return mixed
     */
    public function get($id)
    {
        $result = $this->call(static::BASE_PATTERN . "/{$id}");
        
        if (!empty($result->id)) {
            $this->lastId = $result->id;
        }
        
        return $result;
    }
    
    /**
     * Gets contacts for a seller.
     * 
     * @see https://github.com/volcano/billing/wiki/API#contacts
     * 
     * @param int $id
     *   Seller Id. Required only if it hasn't been set from a previous ->get call.
     * 
     * @return mixed
     */
    public function getContacts($id = null)
    {
        if (empty($id) && !empty($this->lastId)) {
            $id = $this->lastId;
        }
        
        return $this->call(static::BASE_PATTERN . "/{$id}/contacts");
    }
}