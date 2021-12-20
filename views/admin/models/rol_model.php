<?php

class Rol_model
{
    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    /**
     * Get all rols.
     * 
     * @return array The array associative of rols.
     */
    function all() {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT * FROM rol ORDER BY id ASC');
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
