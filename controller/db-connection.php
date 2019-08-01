<?php
    class DBConnection {
        function __construct() {
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'thechapo_admin');
            define('DB_PASSWORD', '&SbVLiuoJ*jo');
            define('DB_DATABASE', 'thechapo_users');
            $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        }

        public function validateCredentials($username, $password){
            // username and password sent from form

            $myusername = mysqli_real_escape_string($this->conn, $username);
            $mypassword = mysqli_real_escape_string($this->conn, $password);

            $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($this->conn, $sql);
            if(is_null($result)) {
                return $result;
            } else {
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                return $row;
            }
        }

        public function getMovies(){
            $sql = "SELECT * FROM movies";
            $result = $this->conn->query($sql);
            return $result->fetch_all();
        }

        public function getMovie($movieId){
            $sql = "SELECT * FROM movies WHERE id = '$movieId'";
            $result = $this->conn->query($sql);
            return $result->fetch_array();
        }

        public function deleteMovie($movieId){
            $sql = "DELETE FROM movies WHERE id = '$movieId'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function agregarPelicula($title, $overview, $subtitle, $rating){
            $mytitle = mysqli_real_escape_string($this->conn, $title);
            $myoverview  = mysqli_real_escape_string($this->conn, $overview);
            $mysubtitle  = mysqli_real_escape_string($this->conn, $subtitle);
            $myrating    = mysqli_real_escape_string($this->conn, $rating);
            $sql = "INSERT INTO movies (original_title,overview,tagline,vote_average) VALUES ('$mytitle','$myoverview','$mysubtitle','$myrating')";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_error($this->conn);
        }

        public function editarPelicula($id, $title, $overview, $subtitle, $rating){
            $mytitle = mysqli_real_escape_string($this->conn, $title);
            $myoverview  = mysqli_real_escape_string($this->conn, $overview);
            $mysubtitle  = mysqli_real_escape_string($this->conn, $subtitle);
            $myrating    = mysqli_real_escape_string($this->conn, $rating);
            $sql = "UPDATE movies SET original_title='$mytitle',overview='$myoverview',tagline='$mysubtitle',vote_average='$myrating' WHERE id=$id";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_error($this->conn);
        }
    }
    return new DBConnection();
?>