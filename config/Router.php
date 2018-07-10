<?php

namespace config;

use controllers\AppController as AppController;

class Router
{
  protected $controller = "";
  protected $method = "actionIndex";
  protected $params = [];

  public function __construct() {
    $this->getController();
  }

  public function getController()
  {
    if (isset($_GET['url'])) {
      $url = $this->getUrl();

      $controllerName = "controllers\\" . ucfirst(strtolower($url[0])) . "Controller";
      unset($url[0]);

      if (class_exists($controllerName, true)) {

        $this->controller = new $controllerName;

        if (isset($url[1])) {

          $methodName = "action" . ucfirst(strtolower($url[1]));
          unset($url[1]);

          if(method_exists($this->controller, $methodName)){
            $this->method = $methodName;
          }else {
            $this->method = "actionIndex";
          }
        }


        $this->params = $url ? array_values($url) : $this->params;
      } else {
        \header('Location: /');
      }
    } else {
      $this->controller = new AppController;
    }
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function getUrl()
  {
    return explode("/", filter_var(rtrim($_GET['url']), FILTER_SANITIZE_URL));
  }
}