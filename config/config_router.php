<?php
namespace config;

class config_router
{
    protected $controller;
    protected $action;
    protected $params;
    protected $uri;
    protected $route;
    protected $method;

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function __construct()
    {
        $uri=$_SERVER['REQUEST_URI'];

        if ($uri == '') {
            echo " uri is empty";

        } else {
            $this->uri=$uri;
            $uri_parts = explode('?', $uri);
            $path = explode('/', $uri_parts[0]);
            array_shift($path);
            if (count($path)) {
                if (current($path)) {
                    if(preg_match('/%/',current($path))){
                        header('Location:'.HEADER);
                    }

                    $this->controller = 'controller'.DS.'controller_' . strtolower(current($path));
                    array_shift($path);
                }else{
                    header('Location:'.'http://'.$_SERVER['SERVER_NAME'].'/index');
                }
                if (current($path)) {
                    $this->action = strtolower(current($path));
                    array_shift($path);
                }
                $this->params = $uri_parts[1];
            }else{
                header('Location: http://www.example.com/');
            }
        }

    }

}
