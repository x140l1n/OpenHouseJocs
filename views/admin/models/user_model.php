<?php

class User_model
{

    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

       
    /**
     * Check if the logging is correct.
     *
     * @param  string $email The email of user.
     * @param  string $password The password of user.
     * @return array|boolean If the login is correct, returns the array data of user, otherwise, false.
     */
    function login($email, $password)
    {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT * FROM user WHERE email = :email');
            $query->execute(['email' => $email]);
            $row = $query->fetch(PDO::FETCH_ASSOC);

            //If row exist.
            if ($row) {
                $result = $row;

                $password_hash = $row["password"];

                //Check if the password is correct.
                if (!password_verify($password, $password_hash)) {
                    $result = false;
                }
            } else {
                $result = false;
            }
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
