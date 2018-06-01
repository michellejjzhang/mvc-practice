<?php
/**
 * Created by IntelliJ IDEA.
 * User: mzhang
 * Date: 5/31/2018
 * Time: 2:17 PM
 */

class Router {
    private $route = "";
    public function __construct() {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode("/", $uri);
        $this->route = $uri[2];
        $this->control();
    }

    public function control(){
        require_once ("modules" . $this->route . ".class.php");
        $moduleController = new ($this->route."Controller")();
        $moduleController->processRequest();
        $this->display($this->route);
    }

    public function display($viewModel){
        $viewFile = $viewModel . "/index.html";
        require_once $viewFile;
    }
}