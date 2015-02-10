<?php

namespace VolcanoSDK;

class Router
{
    protected $_routeList;
    
    protected static $instance;
    
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        
        return static::$instance;
    }
    
    /**
     * Loads the location of the routes file.
     * 
     * @return string
     */
    protected function getRouteFileLocation()
    {
        $dir = getenv('HOME') . '/.volcano-sdk';
        
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        
        return $dir . '/routes.json';
    }
    
    /**
     * Loads Routes
     */
    public function loadRoutes()
    {
        $rfile = $this->getRouteFileLocation();
        
        if (!file_exists($rfile) || time() - filemtime($rfile) > 86000) {
            $this->loadRoutesFromService();
            return;
        }
        
        $this->_routeList = json_decode(
            file_get_contents($rfile),
            true
        );
    }
    
    /**
     * Loads the routs fromm the api endpoint and stores them locally.
     */
    public function loadRoutesFromService()
    {
        $service = new Service('endpoints');
        $service->routes(array(
            'get' => array(
                'path'   => '/apie/ ndpoints',
                'method' => 'GET',
            )
        ));
        
        $this->_routeList = $service->get();
        $this->cacheRoutes();
    }
    
    /**
     * Stores any loaded routes locally.
     * 
     */
    public function cacheRoutes()
    {
        file_put_contents($this->getRouteFileLocation(), json_encode($this->_routeList));
    }
    
    /**
     * Returns routes for a given service.
     * 
     * @return array|null
     */
    public function getRoutes($serviceName)
    {
        if (!isset($this->_routeList)) {
            $this->loadRoutes();
        }
        
        if (isset($this->_routeList[$serviceName])) {
            return $this->_routeList[$serviceName];
        }
        
        return null;
    }
}