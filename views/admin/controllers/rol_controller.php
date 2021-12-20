<?php
require_once("../models/rol_model.php");

class Rol
{
    private $model = null;

    public function __construct()
    {
        $this->model = new Rol_model();
    }

    /**
     * Get all rols.
     */
    function all()
    {
        try {
            $result = $this->model->all();

            Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
        } catch (PDOException $e) {
            Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
        }
    }
}
