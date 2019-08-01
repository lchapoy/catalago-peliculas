<?php
    class DBConnection {
        function __construct() {
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', NULL);
            define('DB_DATABASE', 'movies');
            $this->db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        }

        public function validateCredentials($username, $password){
            // username and password sent from form

            $myusername = mysqli_real_escape_string($this->db, $username);
            $mypassword = mysqli_real_escape_string($this->db, $password);

            $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($this->db,$sql);
            if(is_null($result)) {
                return $result;
            } else {
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                return $row;
            }
            //;


        }

        public function getMovies(){
            $sql = "SELECT * TOP 10 FROM movies";
            $result = mysqli_query($this->db,$sql);
            if(is_null($result)) {
                return $result;
            } else {
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                return $row;
            }
            //;


        }
    }
    return new DBConnection();
?>