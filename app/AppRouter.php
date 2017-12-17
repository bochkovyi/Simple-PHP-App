<?php

namespace App;
use App\Services\AuthService;

class AppRouter
{
    private $routes;

    public function __construct() {
        $this->routes = json_decode(file_get_contents(APP_LOCATION . 'routes.json'), true);
        AuthService::getInstance()->isLoggedIn();
    }
    /**
    * Calls appropriate controllers for routes.
    * Example: /home will call HomeController->init()
    */
    public function init() 
    {
        $url = isset($_GET['url']) ? strtolower($_GET['url']) : false;

        if (!$url) {
            redirect('home');
        }

        $url = rtrim($url ,'/');

        $ControllerRaw = isset($this->routes[$url]) ? $this->routes[$url] : '';

        $isSimpleRoute = !is_array($ControllerRaw) ? true : false;

        $Controller = '\App\Controllers\\' . ($isSimpleRoute ? $ControllerRaw : $ControllerRaw['controller']);

        if(class_exists($Controller)){
			$instance = new $Controller;
            $isSimpleRoute ? $instance->init() : $instance->{$ControllerRaw['action']}() ;
		} else {
			return view("404", ['message' => 'This page does not exist. Cette page n\'existe pas. Diese Seite existiert nicht. Просто нажмите куда-нибудь:)']);
		}
    }
}