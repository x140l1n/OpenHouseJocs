<?php
require_once("../models/cycle_model.php");

class Cycle
{
    private $model = null;

    public function __construct()
    {
        $this->model = new Cycle_model();
    }

    /**
     * Get all cycles from one family.
     */
    function all()
    {
        if (isset($_POST["id_family"])) {

            try {
                $result = $this->model->all($_POST["id_family"]);

                Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
            } catch (PDOException $e) {
                Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
            }
        } else {
            Response::send(array("msg" => "Missing params => [id_family]."), Response::HTTP_UNPROCESSABLE_ENTITY, "Missing params => [email, password]");
        }
    }
}
