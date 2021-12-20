<?php

class Cycle_model
{
    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    /**
     * Get all cycles from one family.
     * 
     * @return array The array associative of cycles.
     */
    function all($id_family) {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT * FROM cycle WHERE id_family = :id_family ORDER BY name ASC');
            $query->bindParam(":id_family", $id_family);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) 
        {
            throw $e;
        }

        return $result;
    }

    public function __destruct()
    {
        if (isset($this->db)) {
            $this->db->disconnect();
            $this->db = null;
        }
    }
}
