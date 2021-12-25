<?php
require_once("../models/family_model.php");

class Family
{
    private $model = null;

    public function __construct()
    {
        $this->model = new Family_model();
    }

    /**
     * Get all families.
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

    /**
     * Get count of families interested.
     */
    function countUserFamilyAll()
    {
        try {
            $result = $this->model->countUserFamilyAll();

            Response::send(array("msg" => "Ok.", "data" => $result), Response::HTTP_OK);
        } catch (PDOException $e) {
            Response::send(array("msg" => "Error ocurred: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR, "Error ocurred: " . $e->getMessage());
        }
    }
}
