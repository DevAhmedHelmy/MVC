<?php


namespace PHPMVC\LIB;


class FrontController
{
    const NOT_FOUND_ACTION = 'notFoundAction';
    const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\NotFoundController';
    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();
    function __construct()
    {
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH), '/'));

//        to get controller from url
        if(isset($url[0]) && $url[0] != '')
        {
            $this->_controller = $url[0];
        }

//        to get action from url
        if(isset($url[1]) && $url[1] != '')
        {
            $this->_action = $url[1];

}//        to get params from url
        if(isset($url[2]) && $url[2] != '')
        {
            $this->_params = explode('/', $url[2]);
        }
//        @list($this->_controller, $this->_action, $this->_params) = explode('/',trim($url,'/'),3);     // to explode url to get controller and action
//        $this->_params = explode('/', $this->_params); //this is params sent with url

    }
    public function dispatch()
    {
//        to call controller
        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
//        to create instance from controller class
//        $class  = new $controllerClassName();

//        this status where not found controller
        if(!class_exists($controllerClassName))
        {
            $controllerClassName = self::NOT_FOUND_CONTROLLER;

        }
        $controller = new $controllerClassName();

//        Actions
        $actionName = $this->_action . 'Action';
        if (!method_exists($controller,$actionName))
        {
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }

//        to set controller and action and params
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->$actionName();


    }

}