<?php
require_once("../models/user_model.php");

class User
{
    private $model = null;

    public function __construct()
    {
        $this->model = new User_model();
    }

    /**
     * Check if the logging is correct and return response and status code.
     */
    function login()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            try {
                $email = $_POST["email"];
                $password = $_POST["password"];

                $result = $this->model->login($email, $password);

                if ($result) {
                    //Create new session.
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                
                    $_SESSION['id'] = $result["id"];
                    $_SESSION['email'] = $result["email"];
                    $_SESSION['firstname'] = $result["firstname"];
                    $_SESSION['lastname'] = $result["lastname"];
                    $_SESSION['id_rol'] = $result["id_rol"];
                    $_SESSION['nickname'] = $result["id_rol"];

                    Response::send(array("msg" => "Login correct.", "data" => $result), Response::HTTP_OK);
                } else {
                    Response::send(array("msg" => "Login failed."), Response::HTTP_UNAUTHORIZED, "Login failed ($email, $password).");
                }
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [email, password]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [email, password]");
        }
    }
}
