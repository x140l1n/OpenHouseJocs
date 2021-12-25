<?php

class Ranking_model
{
    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get all ranking top 10 of games.
     * 
     * @return array The array associative of ranking top 10.
     */
    function allTopTen()
    {
        $result = null;

        try {
            $query = $this->db->connect()->query('SELECT u.id, u.nickname, c.name as cycle, ugc.points FROM user_game_cycle ugc INNER JOIN cycle c ON c.id = ugc.id_cycle INNER JOIN user u ON u.id = ugc.id_user WHERE id_game = 3 ORDER BY ugc.points DESC LIMIT 10');
            $query->execute();
            $ranking_doodle_jump = $query->fetchAll(PDO::FETCH_ASSOC);

            $query = $this->db->connect()->query('SELECT u.id, u.nickname, ugc.points FROM user_game_cycle ugc INNER JOIN user u ON u.id = ugc.id_user WHERE id_game = 4 ORDER BY ugc.points DESC LIMIT 10');
            $query->execute();
            $ranking_snake = $query->fetchAll(PDO::FETCH_ASSOC);

            $query = $this->db->connect()->query('SELECT u.id, u.nickname, c.name as cycle, ugc.points FROM user_game_cycle ugc INNER JOIN cycle c ON c.id = ugc.id_cycle INNER JOIN user u ON u.id = ugc.id_user WHERE id_game = 2 ORDER BY ugc.points DESC LIMIT 10');
            $query->execute();
            $ranking_space_invaders = $query->fetchAll(PDO::FETCH_ASSOC);

            $query = $this->db->connect()->query('SELECT u.id, u.nickname, ugc.points FROM user_game_cycle ugc INNER JOIN user u ON u.id = ugc.id_user WHERE id_game = 1 ORDER BY ugc.points DESC LIMIT 10');
            $query->execute();
            $ranking_arkanoid = $query->fetchAll(PDO::FETCH_ASSOC);

            $result = array(
                $ranking_doodle_jump,
                $ranking_snake,
                $ranking_space_invaders,
                $ranking_arkanoid
            );
        } catch (PDOException $e) {
            throw $e;
        }

        return $result;
    }

    /**
     * Get all ranking by id game and id cycle.
     * 
     * @param string $nickname The nickname to search.
     * @param string $id_game The id game of ranking.
     * @param string $id_cycle The id cycle of ranking.
     * @return array The array associative of ranking.
     */
    function allByIdGameIdCycle($nickname, $id_game, $id_cycle)
    {
        $result = null;

        try {
            $query = $this->db->connect()->prepare('SELECT u.id, u.nickname, ugc.points FROM user_game_cycle ugc INNER JOIN user u ON u.id = ugc.id_user WHERE u.nickname LIKE :nickname AND id_game = :id_game AND id_cycle <=> :id_cycle ORDER BY ugc.points DESC');
            $query->bindValue(":nickname", "%" . $nickname . "%");
            $query->bindParam(":id_game", $id_game);
            $query->bindParam(":id_cycle", $id_cycle);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
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
