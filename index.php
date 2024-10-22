<?php

require 'vendor/autoload.php';
use App\Core\Layout;
use App\Core\Routes;

/** @var string */
const GET = "GET";
const POST = "POST";

// Load the routes
$layout = new Layout();
$method = $_SERVER['REQUEST_METHOD'];
$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$request = str_replace('weekly-pre-scheduling/index.php/', '', $request);
routes($method, $request);

function routes($method, $request)
{
    if ($method == GET) {
        $routes = Routes::getRoutes(GET);
    } elseif ($method == POST) {
        $routes = Routes::getRoutes(POST);
    }

    if (! empty($routes)) {
        foreach ($routes as $route) {
            if ($request === $route['url']) {
                $controller = $route['controller'];
                $method = $route['method'];
                $object = new $controller();
                $object->$method();

                break;
            }
        }
    }
}
