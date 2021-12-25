<?php

class Family_model
{
    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    /**
     * Get all families.
     * 
     * @return array The array associative of families.
     */
    function all() {
        $result = null;

        try 
        {
            $query = $this->db->connect()->query('SELECT * FROM family ORDER BY name ASC');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) 
        {
            throw $e;
        }

        return $result;
    }

    /**
     * Get counts of families interested.
     * 
     * @return array The array counts of families interested.
     */
    function countUserFamilyAll()
    {
        $result = null;

        try 
        {
            $query = $this->db->connect()->query('SELECT COUNT(*) FROM user_family WHERE id_family = 1');
            $query->execute();
            $count_1 = $query->fetchColumn();

            $query = $this->db->connect()->query('SELECT COUNT(*) FROM user_family WHERE id_family = 2');
            $query->execute();
            $count_2 = $query->fetchColumn();

            $query = $this->db->connect()->query('SELECT COUNT(*) FROM user_family WHERE id_family = 3');
            $query->execute();
            $count_3 = $query->fetchColumn();

            $query = $this->db->connect()->query('SELECT COUNT(*) FROM user_family WHERE id_family = 4');
            $query->execute();
            $count_4 = $query->fetchColumn();

            $result = array($count_1 ? $count_1 : 0, $count_2 ? $count_2 : 0, $count_3 ? $count_3 : 0, $count_4 ? $count_4 : 0);
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
