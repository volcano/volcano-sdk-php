<?php

namespace VolcanoSDK;

class Service
{
    protected $baseUrl;
    protected $callMethod = 'GET';
    protected $returnRaw = false;
    protected $apiKey;
    
    /**
     * Getter/Setter for $this->baseUrl.
     * 
     * @param string $url
     * 
     * @return string|this
     */
    public function baseUrl($url = null) {
        if (is_null($url)) {
            return $this->baseUrl;
        }
        
        $this->baseUrl = $url;
        return $this;
    }
    
    /**
     * Getter/Setter for $this->callMethod.
     * 
     * @param string $method
     * 
     * @return string|this
     */
    public function callMethod($method = null)
    {
        if (is_null($method)) {
            return $this->callMethod;
        }
        
        $acceptable_methods = array(
            'GET',
            'POST',
            'PUT',
            'DELETE',
        );
        
        $method = strtoupper($method);
        
        if (!in_array($method, $acceptable_methods)) {
            throw new \Exception('Invalid HTTP Verb');
        }
        
        return $this;
    }
    
    /**
     * Getter/Setter for $this->apiKey.
     * 
     * @param string $method
     * 
     * @return string|this
     */
    public function apiKey($key = null)
    {
        if (is_null($key)) {
            return $this->apiKey;
        }
        
        $this->apiKey = $key;
        return $this;
    }
    
    /**
     * Getter/Setter for $this->returnRaw.
     * 
     * @param string $method
     * 
     * @return string|this
     */
    public function returnRaw($raw = null)
    {
        if (is_null($raw)) {
            return $this->returnRaw;
        }
        
        $this->returnRaw = (bool) $raw;
        
        return $this;
    }
    
    /**
     * Actually makes the curl call to the webservice.
     * 
     * Not intended to be called directly.
     * 
     * @param string $url
     * @param array $args
     *   Any service arguments.
     * 
     * @return string|StdClass
     *   String if returnRaw is true, otherwise StdClass
     */
    protected function call($url, $args = array())
    {
        $curl_params = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT      => "Volcano PHP SDK",
        );
        
        if (!is_array($args)) {
            $args = array($args);
        }
        
        if (!empty($this->apiKey)) {
            $args['api_key'] = $this->apiKey;
        }
        
        if ($this->callMethod == 'POST') {
            $curl_params[CURLOPT_POST] = 1;
        } else if ($this->callMethod == 'PUT') {
             $curl_params[CURLOPT_CUSTOMREQUEST] = 'PUT';
        } else if ($this->callMethod == 'DELETE') {
            $curl_params[CURLOPT_CUSTOMREQUEST] = 'DELETE';
        }
        
        if (!empty($args)) {
            if ($this->callMethod != 'GET') {
                $curl_params[CURLOPT_POSTFIELDS] = $args;
            } else {
                $url .= '?' . http_build_query($args);
            }
        }
        
        $url = $this->baseUrl . $url;
        
        $ch = curl_init($url);
        curl_setopt_array($ch, $curl_params);
        
        $result = curl_exec($ch);
        $errno = curl_errno($ch);
        $err = curl_error($ch);
        
        curl_close($ch);
        
        if (!empty($errno)) {
            throw new \Exception("Curl Error: $err");
        }
        
        if ($this->returnRaw) {
            return $result;
        }
        return json_decode($result);
    }
}