<?php
    class Postgres{
        private $dns = "pgsql:host=postgres;port=5432;dbname=admin";
        private $user = "admin";
        private $password = "admin";
        private $co;

        function connecter(){
            try{
                $this->co = new PDO($this->dns, $this->user, $this->password);
                return $this->co;
            }
            catch(PDOException $e){
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
            }
        }

    }

?>
