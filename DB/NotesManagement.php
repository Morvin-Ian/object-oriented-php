<?php
    include_once 'Database.php';


    class ManageNotes{
        public $connection;

        public function __construct()
        {
            $db_connection = new db_connection();
            $this->connection = $db_connection->connect();
            return $this->connection;
        }

        public function create_notes($title, $description, $date_created){
            $statement = $this->connection->prepare("INSERT INTO details (title, description, date_created) VALUES (:title, :description, :date_created)");
            $statement->bindValue(":title", $title);
            $statement->bindValue(":description", $description);
            $statement->bindValue(":date_created", $date_created);
            $statement->execute();

        }

        public function list_notes(){
            $statement = $this->connection->prepare("SELECT * FROM details ORDER BY date_created DESC");
            $statement->execute();
            $notes =  $statement->fetchAll(PDO::FETCH_ASSOC);
            return $notes;

        }

        public function list_note($id){
            $statement = $this->connection->prepare("SELECT * FROM details WHERE id=:id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $note =  $statement->fetchAll(PDO::FETCH_ASSOC);
            return $note;

        }

        public function delete_notes($id){
            $statement = $this->connection->prepare("DELETE FROM details WHERE id=:id");
            $statement->bindValue(":id", $id);
            $statement->execute();
        
        }

        public function update_notes($id, $title, $description){
            $statement = $this->connection->prepare("UPDATE details SET title=:title, description=:description WHERE id= :id");
            $statement->bindValue(":id", $id);
            $statement->bindValue(":title", $title);
            $statement->bindValue(":description", $description);
            $statement->execute();
        
        }

    }