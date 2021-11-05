<?php
header('Content-Type: application/json; charset=utf-8');

//Import the librarys.
require_once("../libs/response.php");
require_once("../config/constants.php");
require_once("../models/database.php");

iniErrorLog();

$url = isset($_GET["url"]) ? $_GET["url"] : null;

//Check if the url is setted.
if ($url) {
    $url_array = explode("/", rtrim($url, "/"));

    /*
        [0] => controller,
        [1] => method,
        [2] => params,
        [3] => params,
        ... => params,
    */

    $controller = "";
    $method = "";
    $params_exists = false;

    //If exists controller in the url.
    if (isset($url_array[0])) {
        $controller = $url_array[0];
    }

    //If exists method in the url.
    if (isset($url_array[1])) {
        $method = $url_array[1];
    }

    //If exists params in the url.
    if (isset($url_array[2])) {
        $params_exists = true;
    }

    //Check if controller exists.
    if (file_exists($controller . "_controller.php")) {
        require_once $controller . "_controller.php";

        $controller = new $controller;

        if (method_exists($controller, $method)) {
            if ($params_exists) {
                $params_array = [];

                for ($i = 0; $i < sizeof($url) - 2; $i++) {
                    array_push($params_array, $url[$i + 2]);
                }
                $controller->{$method}($params_array);
            } else {
                $controller->{$method}();
            }
        } else {
            Response::send(array("msg" => "Method '$method' not found."), Response::HTTP_NOT_FOUND);
        }
    } else {
        Response::send(array("msg" => "Controller '$controller' not found."), Response::HTTP_NOT_FOUND);
    }
} else {
    Response::send(array("msg" => "URL not specified."), Response::HTTP_NOT_FOUND);
}

/**
 * Initialize the error logs.
 */
function iniErrorLog()
{
    error_reporting(E_ALL); //Error/Exception engine, always use E_ALL

    ini_set('ignore_repeated_errors', TRUE); //Always use TRUE

    ini_set('display_errors', FALSE); //Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

    ini_set('log_errors', TRUE); //Error/Exception file logging engine.

    ini_set("error_log", "../logs/php-error.log"); //Specifies the path error log.
}
