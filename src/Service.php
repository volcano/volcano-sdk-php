<?php

namespace VolcanoSDK;

class Service
{
    protected static $baseUrl;
    protected static $apiKey;
    
    protected $callMethod = 'GET';
    protected $returnRaw = false;
    
    protected $serviceName;
    protected $routes;
    
    protected static $instances = array();
    
    public function __construct($serviceName)
    {
        $this->serviceName = $serviceName;
    }
    
    /**
     * Grabs the service requester for a given service name. If no routes defined
     * it will Exception.
     * 
     * @param string $serviceName
     */
    public static function getService($serviceName)
    {
        $serviceName = strtolower(preg_replace('/([A-Z])/', '-$1', $serviceName));
        
        if (!isset(static::$instances[$serviceName])) {
            $routes = \VolcanoSDK\Router::getInstance()->getRoutes($serviceName);
            
            if (empty($routes)) {
                throw new \Exception("No routes defined for $serviceName");
            }
            
            $inst = new static($serviceName);
            $inst->routes($routes);
            
            static::$instances[$serviceName] = $inst;
        }
        
        return static::$instances[$serviceName];
    }
    
    /**
     * Magic __call method to automatically route requests.
     * 
     */
    public function __call($method, $args)
    {
        $method = strtolower(preg_replace('/([A-Z])/', '-$1', $method));
        if (empty($this->routes[$method])) {
            throw new \Exception("No route defined for $method.");
        }
        
        $url_base = $this->routes[$method]['path'];
        $this->callMethod($this->routes[$method]['method']);
        
        $lp = count($args) - 1;
        
        if (is_array($args[$lp])) {
            $call_args = array_pop($args);
        } else {
            $call_args = null;
        }
        
        foreach ($args as $pos => $arg) {
            $pos++;
            $url_base = str_replace('$' . $pos, $arg, $url_base);
        }
        
        return $this->call($url_base, $call_args);
    }
    
    /**
     * Getter/Setter for $this->routes.
     * 
     * @param string $url
     */
    public function routes($routes = null)
    {
        if (is_null($routes)) {
            return $routes;
        }
        
        $this->routes = $routes;
        
        return $this;
    }
    
    /**
     * Getter/Setter for static::$baseUrl.
     * 
     * @param string $url
     */
    public static function baseUrl($url = null) {
        if (is_null($url)) {
            return static::$baseUrl;
        }
        
        if (substr($url, -1) != '/') {
            $url .= '/';
        }
        
        static::$baseUrl = $url;
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
        
        $this->callMethod = $method;
        
        return $this;
    }
    
    /**
     * Getter/Setter for static::$apiKey.
     * 
     * @param string $method
     */
    public static function apiKey($key = null)
    {
        if (is_null($key)) {
            return static::$apiKey;
        }
        
        static::$apiKey = $key;
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
        
        if (!empty(static::$apiKey)) {
            $args['api_key'] = static::$apiKey;
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
        
        $url = static::$baseUrl . $url;
        
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
        return json_decode($result, true);
    }
}