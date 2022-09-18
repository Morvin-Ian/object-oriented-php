<?php
    include_once '../DB/NotesManagement.php';

    $manage = new ManageNotes();

    $id = $_POST['id'] ?? null;

    if(!$id){
        header("Location:../");
        exit;
    }

    $manage->delete_notes($id);
    header("Location:../");

      
