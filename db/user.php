<?php
class user
{
    private $db; //private database object

    function __construct($conn)
    { //Constructor to initialize private variables to the database connection
        $this->db = $conn;
    }
    public function insertUser($username, $password)
    {

        try {
            $result = $this->getUsername($username);
            if ($result['num'] > 0) {
                return false;
            } else {
                $new_password = md5($password.$username);
                //define sql to be executed
                $sql = "INSERT INTO users (username,password) VALUES (:username,:password)";
                //preparing sql to be executed
                $stmt = $this->db->prepare($sql);
                //bind all the placeholder to the actual events
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $new_password);
                $stmt->execute();
                return true;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        // $sql = "SELECT * FROM dbase WHERE dbase_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->bindparam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getUsername($username)
    {
        $sql = "SELECT count(*) AS num FROM users WHERE username =:username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

}
?>