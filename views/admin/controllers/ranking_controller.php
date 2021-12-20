<?php
require_once("../models/ranking_model.php");

class Ranking
{
    private $model = null;

    public function __construct()
    {
        $this->model = new Ranking_model();
    }

    /**
     * Get count of families interested.
     */
    function allTopTen()
    {
        try {
            $result = $this->model->allTopTen();

            Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
        } catch (PDOException $e) {
            Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
        }
    }

    function allByIdGameIdCycle() {
        if (isset($_POST["nickname"]) && isset($_POST["id_game"]) && (isset($_POST["id_cycle"]) || $_POST["id_cycle"] === null)) {
            try {
                $result = $this->model->allByIdGameIdCycle($_POST["nickname"], $_POST["id_game"], $_POST["id_cycle"]);

                Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [id_game, id_cycle]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [email, password]");
        }
    }
}
