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
     * @param string $email The email of user.
     * @param string $password The password of user.
     * @return array|boolean If the login is correct, returns the array data of user, otherwise, false.
     */
    function login($email, $password)
    {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT * FROM user WHERE email = :email AND password IS NOT NULL AND (id_rol = 1 OR id_rol = 2)');
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
    
    /**
     * Get users with filters.
     * 
     * @param string $search The text to search.
     * @param string $search_by The type of search (nickname, firstname, lastname or email).
     * @param string $id_rol The id rol of user.
     * @return array The array associative of users.
     */
    function all($search, $search_by, $id_rol) {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT u.*, r.name as rol FROM user u INNER JOIN rol r ON r.id = u.id_rol 
                                                    WHERE ' . $search_by . ' LIKE :search AND (u.id_rol = :id_rol OR :_id_rol = \'0\')
                                                    ORDER BY u.created_at DESC');
            $query->bindValue(":search", "%" . $search . "%");
            $query->bindParam(":id_rol", $id_rol);
            $query->bindParam(":_id_rol", $id_rol);
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
     * Get last students.
     * 
     * @param string $limit The limit of rows.
     * @return array The array associative of students.
     */
    function lastStudents($limit) {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT * FROM user WHERE id_rol = 3 ORDER BY created_at DESC LIMIT :limit');
            $query->bindParam(":limit", $limit);
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
     * Add new user.
     * 
     * @param string $nickname The nickname of user.
     * @param string $firstname The name of user.
     * @param string $lastname The lastname of user.
     * @param string $email The email of user.
     * @param string $id_rol The id rol of user.
     * @param string $password The password of user.
     * @return string The new id of user inserted.
     */
    function add($nickname, $firstname, $lastname, $email, $id_rol, $password) {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('INSERT INTO user (email, password, firstname, lastname, nickname, id_rol, created_at) 
                                                    VALUE (:email, :password, :firstname, :lastname, :nickname, :id_rol, :created_at)');
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $password);
            $query->bindParam(":firstname", $firstname);
            $query->bindParam(":lastname", $lastname);
            $query->bindParam(":nickname", $nickname);
            $query->bindParam(":id_rol", $id_rol);
            $query->bindParam(":created_at", date("Y-m-d H:i:s"));
            $query->execute();
            
            $result = $this->db->connect()->lastInsertId();
        } 
        catch (PDOException $e) 
        {
            throw $e;
        }

        return $result;
    }

    /**
     * Update existing user.
     * 
     * @param string $id The id of user.
     * @param string $nickname The nickname of user.
     * @param string $firstname The name of user.
     * @param string $lastname The lastname of user.
     * @param string $email The email of user.
     * @param string $id_rol The id rol of user.
     * @return string The new id of user inserted.
     */
    function update($id, $nickname, $firstname, $lastname, $email, $id_rol) {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('UPDATE user SET email = :email, firstname = :firstname, lastname = :lastname, nickname = :nickname, id_rol = :id_rol WHERE id = :id');
            $query->bindParam(":email", $email);
            $query->bindParam(":firstname", $firstname);
            $query->bindParam(":lastname", $lastname);
            $query->bindParam(":nickname", $nickname);
            $query->bindParam(":id_rol", $id_rol);
            $query->bindParam(":id", $id);
            $query->execute();
            
            $result = $id;
        } 
        catch (PDOException $e) 
        {
            throw $e;
        }

        return $result;
    }

    /**
     * Update password of existing user.
     * 
     * @param string $id The id of user.
     * @param string $password The password of user.
     * @return string The new id of user inserted.
     */
    function change_password($id, $password) {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('UPDATE user SET password = :password WHERE id = :id');
            $query->bindParam(":password", $password);
            $query->bindParam(":id", $id);
            $query->execute();
            
            $result = $id;
        } 
        catch (PDOException $e) 
        {
            throw $e;
        }

        return $result;
    }

    /**
     * Check if exists user.
     * 
     * @param string $nickname The nickname of user.
     * @param string $email The email of user.
     * @return boolean TRUE if exist, otherwise, FALSE.
     */
    function checkExistUser($nickname, $email) {
        $result = true;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT * FROM user WHERE nickname = :nickname OR email = :email LIMIT 1');
            $query->bindParam(":email", $email);
            $query->bindParam(":nickname", $nickname);
            $query->execute();
            
            if ($query->rowCount() == 0) {
                $result = false;
            }
        } 
        catch (PDOException $e) 
        {
            throw $e;
        }

        return $result;
    }

    /**
     * Check if exists user except id.
     * 
     * @param string $id The id of user.
     * @param string $nickname The nickname of user.
     * @param string $email The email of user.
     * @return boolean TRUE if exist, otherwise, FALSE.
     */
    function checkExistUserExceptId($id, $nickname, $email) {
        $result = true;

        try 
        {
            $query = $this->db->connect()->prepare('SELECT * FROM user WHERE (nickname = :nickname OR email = :email) AND id != :id  LIMIT 1');
            $query->bindParam(":email", $email);
            $query->bindParam(":nickname", $nickname);
            $query->bindParam(":id", $id);
            $query->execute();
            
            if ($query->rowCount() == 0) {
                $result = false;
            }
        } 
        catch (PDOException $e) 
        {
            throw $e;
        }

        return $result;
    }

    /**
     * Delete user by id.
     * 
     * @param string $id The id of user.
     * @return string The id of user deleted.
     */
    function delete($id) {
        $result = null;

        try 
        {
            $query = $this->db->connect()->prepare('DELETE FROM user WHERE id = :id');
            $query->bindParam(":id", $id);
            $query->execute();
            
            $result = $id;
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
