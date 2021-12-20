<?php
header('Content-Type: application/json; charset=utf-8');

//Import the libraries and database.
require_once("../config/constants.php");
require_once("../libs/response.php");
require_once("../models/database.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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

            try {
                //Check if the params is json.
                process_params_json();

                if ($params_exists) {
                    $params_array = [];

                    for ($i = 0; $i < sizeof($url) - 2; $i++) {
                        array_push($params_array, $url[$i + 2]);
                    }
                    $controller->{$method}($params_array);
                } else {
                    $controller->{$method}();
                }
            } catch (Exception $e) {
                Response::send(null, Response::HTTP_NOT_FOUND, "Method '$method' not found.", "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(null, Response::HTTP_NOT_FOUND, "Method '$method' not found.");
        }
    } else {
        Response::send("404 Página no encontrada.", Response::HTTP_NOT_FOUND, "Controller not found.");
    }
} else {
    Response::send(null, Response::HTTP_NOT_FOUND, "URL not specified.");
}


/**
 * Create post values from json.
 */
function process_params_json()
{
    $json = file_get_contents('php://input');

    if ($json !== "") {
        $posts = json_decode($json);

        //Create post values.
        foreach ($posts as $key => $value) {
            $_POST[$key] = $value;
        }
    }
}

/**
 * Initialize the error logs.
 */
function iniErrorLog()
{
    error_reporting(E_ERROR | E_PARSE); //Error/Exception engine, always use E_ALL

    ini_set('ignore_repeated_errors', TRUE); //Always use TRUE

    ini_set('display_errors', FALSE); //Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

    ini_set('log_errors', TRUE); //Error/Exception file logging engine.

    ini_set("error_log", "../logs/php-error.log"); //Specifies the path error log.
}
