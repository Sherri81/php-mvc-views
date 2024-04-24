<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$path = str_replace("/webdev/RickJames/php-mvc-routing/", "/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// Local
// $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// require "src/router.php";

spl_autoload_register( function (string $class_name) {

    // var_dump("src/" . str_replace("\\", "/", $class_name) . ".php");
    require "src/" . str_replace("\\", "/", $class_name) . ".php";

});

$router = new Framework\Router;

// begin adding routes to the $routes array
// $router->add("/webdev/RickJames/php-mvc-routing", ["controller" => "home", "action" => "index"]);
// $router->add("/products", ["controller" => "products", "action" => "index"]);
// $router->add("/products/show", ["controller" => "products", "action" => "show"]);
$router->add("/{controller}/{action}")
// call to matchRoute() to return an array of $params from $routes
$params = $router->matchRoute($path);

// check for non-existent route
if ($params === false) {

    exit("No matching route");

}

// edit these variables to assign values from $params array from Router class
$controller = $params["controller"];
$action = $params["action"];

// require "src/controllers/$controller.php";
$controller = "App\Controllers\\" . ucwords($params["controller"]);

$controller_object = new $controller;

$controller_object->$action();