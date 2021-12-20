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

    /**
     * Get last students.
     */
    function lastStudents() {
        if (isset($_POST["limit"])) {
            try {
                $limit = $_POST["limit"];

                $result = $this->model->lastStudents($limit);

                Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [limit]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [limit]");
        }
    }

    /**
     * Get users with filters.
     */
    function all() {
        if (isset($_POST["search"]) && isset($_POST["search_by"]) && isset($_POST["id_rol"])) {
            try {
                $result = $this->model->all($_POST["search"], $_POST["search_by"], $_POST["id_rol"]);

                Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [search, search_by, id_rol]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [search, search_by, id_rol]");
        }
    }

    /**
     * Add new user.
     */
    function add() {
        if (isset($_POST["nickname"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["rol"]) && isset($_POST["password"])) {
            try {

                if (!$this->model->checkExistUser($_POST["nickname"], $_POST["email"])) {
                    $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
                    $result = $this->model->add($_POST["nickname"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["rol"], $_POST["password"]);    
                    
                    Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
                } else {
                    Response::send(array("msg" => "Ok.", "data" => "-1"), Response::HTTP_OK);
                }
                
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [nickname, firstname, lastname, email, rol, password]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [nickname, firstname, lastname, email, rol, password]");
        }
    }

    /**
     * Update existing user.
     */
    function update() {
        if (isset($_POST["nickname"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["rol"]) && isset($_POST["id"])) {
            try {

                if (!$this->model->checkExistUserExceptId($_POST["id"], $_POST["nickname"], $_POST["email"])) {
                    $result = $this->model->update($_POST["id"], $_POST["nickname"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["rol"]);    
                    
                    Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
                } else {
                    Response::send(array("msg" => "Ok.", "data" => "-1"), Response::HTTP_OK);
                }
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [nickname, firstname, lastname, email, rol, id]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [nickname, firstname, lastname, email, rol, id]");
        }
    }

    /**
     * Update password of existing user.
     */
    function changepassword() {
        if (isset($_POST["password"]) && isset($_POST["id"])) {
            try {
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
                $result = $this->model->change_password($_POST["id"], $_POST["password"]);    
                
                Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [nickname, firstname, lastname, email, rol, id]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [nickname, firstname, lastname, email, rol, id]");
        }
    }

    /**
     * Delete user by id.
     */
    function delete() {
        if (isset($_POST["id"])) {
            try {
                $result = $this->model->delete($_POST["id"]);

                Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [id]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [id]");
        }
    }
}
