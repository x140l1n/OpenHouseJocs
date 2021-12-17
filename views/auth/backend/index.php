<?php

header('Content-Type: application/json; charset=utf-8');

//Import the librarys.
require_once("response.php");
require_once("constants.php");
require_once("database.php");

//If the action is defined and is not empty.
if (isset($_POST["action"]) && !empty($_POST["action"])) {
    //Get the action name.
    $action = $_POST["action"];

    //Check if the action exists.
    if (function_exists($action)) {
        //Call the action.
        $action();
    } else {
        Response::send(array("msg" => "Function not exists."), Response::HTTP_METHOD_NOT_ALLOWED);
    }
} else {
    Response::send(array("msg" => "Param 'action' missing."), Response::HTTP_METHOD_NOT_ALLOWED);
}

function get_all_cycles()
{
    $cycles = [];

    try {
            $db = new Database();

            $statement = $db->connect()->prepare("SELECT c.id, c.name, c.id_family
                                                  FROM cycle c");

            $statement->execute();

            $cycles = $statement->fetchAll(PDO::FETCH_ASSOC);

            Response::send(array("msg" => "Ok.", "data" => $cycles), Response::HTTP_OK);

    } catch (PDOException $e) {
        Response::send(array("msg" => "An unexpected error has occurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

function get_all_family() {
    $family = [];

    try {
            $db = new Database();
            $statement = $db->connect()->prepare("SELECT f.id, f.name
                                                  FROM family f");
            $statement->execute();
            $family = $statement->fetchAll(PDO::FETCH_ASSOC);
            Response::send(array("msg" => "Ok.", "data" => $family), Response::HTTP_OK);

    } catch (PDOException $e) {
        Response::send(array("msg" => "An unexpected error has occurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}


function get_all_users() {
    $users = [];

    try {
        $db = new Database();
        $statement = $db->connect()->prepare("SELECT u.email, u.firstname, u.lastname, u.id_rol
                                                  FROM user u");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        Response::send(array("msg" => "Ok.", "data" => $users), Response::HTTP_OK);
    } catch (PDOException $e) {
        Response::send(array("msg" => "An unexpected error has occurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}



function insert_user()
{
    $is_new_user = false;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : null;
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : null;
    $nickname = isset($_POST["nickname"]) ? $_POST["nickname"] : null;
    $id_rol = isset($_POST["id_rol"]) ? $_POST["id_rol"] : -1;
    
    try {
        if ($email !== null && $firstname !== null && $lastname !== null && $nickname !== null && $id_rol !== -1) {
            $db = new Database();
            
                //If user not exists.
                $statement = $db->connect()->prepare("INSERT INTO user (email, firstname, lastname, nickname, id_rol) VALUES (:email, :firstname, :lastname, :nickname, :id_rol)");

                $statement->bindParam(":email", $email);
                $statement->bindParam(":firstname", $firstname);
                $statement->bindParam(":lastname", $lastname);
                $statement->bindParam(":nickname", $nickname);
                $statement->bindParam(":id_rol", $id_rol);

                $statement->execute();
                $is_new_user = true;

            Response::send(array("msg" => "Ok.", "is_new_user" => $is_new_user), Response::HTTP_OK);
        } else {
            Response::send(array("msg" => "Miss params"), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    } catch (PDOException $e) {
        Response::send(array("msg" => "An unexpected error has occurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

function get(){
    $ranking = [];
    $ranking_user = null;

    $top = isset($_POST["top"]) ? $_POST["top"] : 5;
    $id_game = isset($_POST["id_game"]) ? $_POST["id_game"] : -1;
    $id_user = isset($_POST["id_user"]) ? $_POST["id_user"] : -1;
    $id_cycle = isset($_POST["id_cycle"]) ? $_POST["id_cycle"] : -1;

    try {
        if ($id_game !== -1 && $id_user !== -1 && $id_cycle !== -1) {
            $db = new Database();

            $statement = $db->connect()->prepare("SELECT u.id, u.nickname, ugc.points
                                                  FROM user_game_cycle ugc
                                                  INNER JOIN user u ON u.id = ugc.id_user
                                                  WHERE ugc.id_game = :id_game AND ugc.id_cycle = :id_cycle
                                                  ORDER BY  ugc.hits DESC, ugc.points DESC
                                                  LIMIT :top");

            $statement->bindParam(":id_game", $id_game);
            $statement->bindParam(":top", $top);
            $statement->bindParam(":id_cycle", $id_cycle);

            $statement->execute();

            $in_top = false;

            foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $row) {

                if ($row["id"] == $id_user) {
                    $in_top = true;
                }

                array_push($ranking, array("id" => $row["id"], "nickname" => $row["nickname"], "points" => $row["points"]));
            }

            //If the user is not in the top 5.
            if (!$in_top) {
                $statement = $db->connect()->prepare("SELECT u.id, u.nickname, ugc.points
                                                      FROM user_game_cycle ugc
                                                      INNER JOIN user u ON u.id = ugc.id_user
                                                      WHERE ugc.id_game = :id_game AND ugc.id_user = :id_user AND ugc.id_cycle = :id_cycle
                                                      LIMIT 1");

                $statement->bindParam(":id_game", $id_game);
                $statement->bindParam(":id_user", $id_user);
                $statement->bindParam(":id_cycle", $id_cycle);

                $statement->execute();

                if ($statement->rowCount() > 0) {
                    $ranking_user = $statement->fetch(PDO::FETCH_ASSOC);
                }
            }

            Response::send(array("msg" => "Ok.", "data" => $ranking, "data_user" => $ranking_user), Response::HTTP_OK);
        } else {
            Response::send(array("msg" => "Miss params."), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    } catch (PDOException $e) {
        Response::send(array("msg" => "An unexpected error has occurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

function insert(){
    $is_new_record = false;
    $id_game = isset($_POST["id_game"]) ? $_POST["id_game"] : -1;
    $id_user = isset($_POST["id_user"]) ? $_POST["id_user"] : -1;
    $id_cycle = isset($_POST["id_cycle"]) ? $_POST["id_cycle"] : -1;
    $points = isset($_POST["points"]) ? $_POST["points"] : -1;

    try {
        if ($id_game !== -1 && $id_user !== -1 && $id_cycle !== -1 && $points !== -1) {
            $db = new Database();

            $statement = $db->connect()->prepare("SELECT u.id, u.nickname, ugc.points
                                                  FROM user_game_cycle ugc
                                                  INNER JOIN user u ON u.id = ugc.id_user
                                                  WHERE ugc.id_user = :id_user AND ugc.id_game = :id_game
                                                  LIMIT 1");

            $statement->bindParam(":id_user", $id_user);
            $statement->bindParam(":id_game", $id_game);

            $statement->execute();

            if ($statement->rowCount() > 0) {
                //If exists score game.
                $current_ranking_user = $statement->fetch(PDO::FETCH_ASSOC);

                //If have new record.
                if ($current_ranking_user && ($current_ranking_user["points"] < $points)) {
                    $statement = $db->connect()->prepare("UPDATE user_game_cycle SET points = :points WHERE id_user = :id_user AND id_game = :id_game AND id_cycle = :id_cycle");

                    $statement->bindParam(":points", $points);
                    $statement->bindParam(":id_user", $id_user);
                    $statement->bindParam(":id_game", $id_game);
                    $statement->bindParam(":id_cycle", $id_cycle);

                    $statement->execute();

                    $is_new_record = true;
                }
            } else {
                //If not exists score game.
                $statement = $db->connect()->prepare("INSERT INTO user_game_cycle (id_user, id_game, id_cycle, points) VALUES (:id_user, :id_game, :id_cycle, :points)");

                $statement->bindParam(":id_user", $id_user);
                $statement->bindParam(":id_game", $id_game);
                $statement->bindParam(":id_cycle", $id_cycle);
                $statement->bindParam(":points", $points);

                $statement->execute();
            }

            Response::send(array("msg" => "Ok.", "is_new_record" => $is_new_record), Response::HTTP_OK);
        } else {
            Response::send(array("msg" => "Miss params"), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    } catch (PDOException $e) {
        Response::send(array("msg" => "An unexpected error has occurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
