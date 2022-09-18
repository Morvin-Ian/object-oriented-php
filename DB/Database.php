<?php
 
    class db_connection{
        protected $conn = null;
        private $db_host = 'localhost';
        private $db_name = 'Notes';
        private $db_user = 'root';
        private $db_password = '';

        public function connect(){
            if($this->conn == null){
                try{
                    $this-> conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user, $this->db_password);

                }catch( PDOException $e){
                    die($e->getMessage());
                  
                }

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn; 
              
            }
           
        }


    };

?>

