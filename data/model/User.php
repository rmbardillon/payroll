<?php 
    class User {
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function login($request)
        {
            $username = $request['username'];
            $password = $request['password'];

            $sql = "SELECT * FROM administrator WHERE username = '$username' AND password = '$password'";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row;
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>