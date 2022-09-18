<?php
    include_once 'Database.php';

    class ManageUsers{
        public $connection;

        public function __construct()
        {
            $db_connection = new db_connection();
            $this->connection = $db_connection->connect();
            return $this->connection;
            
        }

        public function user_registration($username, $email, $pass, $registration_date, $profile){
            $statement = $this->connection->prepare("INSERT INTO users (username, email, pass, registration_date, profile) VALUES (:username, :email, :pass, :registration_date,:profile)");
            $statement->bindValue(':username',$username);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':pass',$pass);
            $statement->bindValue(':registration_date',$registration_date);
            $statement->bindValue(':profile',$profile);
            $statement->execute();
          
        }

        public function user_login($username,$pass){
            $statement = $this->connection->prepare("SELECT * FROM users WHERE username = :username AND pass = :pass");
            $statement->bindValue(':username',$username);
            $statement->bindValue(':pass',$pass);
            $statement->execute();
            $row = $statement->rowCount();
            return $row;
        }

        public function email_exists($email){
            $statement=$this->connection->prepare("SELECT * FROM users WHERE email = :email");
            $statement->bindValue(':email', $email);
            $statement->execute();
            $same_email = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $same_email;
        }

        public function username_exists($username){
            $statement=$this->connection->prepare("SELECT * FROM users WHERE username = :username");
            $statement->bindValue(':username', $username);
            $statement->execute();
            $same_username = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $same_username;
        }

       

    };

  