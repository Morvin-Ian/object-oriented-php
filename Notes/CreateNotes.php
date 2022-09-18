<?php
    include '../Includes/Header.php';
    include_once '../DB/NotesManagement.php';

    $manage =  new ManageNotes();

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = date('Y-m-d H:i:s');

        $manage->create_notes($title,$description, $date);
        header("Location:../");

    }

?>

<div class="m-5">
  <a href="../">
      <i class="fas fa-arrow-left"></i>
  </a>
  <p class="display-5 mb-1 text-center">Create Post</p>
  <form method="POST">
      <div class="mb-2 ">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="@example Engineering" required>
      </div>

      <div class="mb-2 ">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3" placeholder="..."></textarea required>
      </div>

      <button type="submit" class="btn btn-primary btn-default"style="padding-left: 2.5rem; padding-right: 2.5rem;">Post</button>
 </form>

</div>
<!-- <script>
  CKEDITOR.replace( 'description' );
</script> -->
