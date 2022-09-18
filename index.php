<?php
    include 'Includes/Header.php';
    include_once 'DB/NotesManagement.php';
    
    $manage = new ManageNotes();
    $notes = $manage->list_notes();

?>

<div class="container">
<p class="display-6 text-center">Available Reminders</p>
<a class="btn btn-dark btn-sm me-3 ms-3" href="Notes/CreateNotes.php">Add Note</a>
<section  class="d-flex mt-2 text-center">
    <li class="ms-5 me-5"><strong>Title</strong></li>
    <li class="ms-5 me-5"><strong>Description</strong></li>
    <li class="ms-5 me-5"><strong>Date</strong></li>
</section>

<section class="">
    <?php foreach($notes as $index => $note):?> <br>
       <div class="d-flex">
            <p class="ms-4"><?php echo 1+$index.') '.$note['title']?></p>
            <p class="ms-4"><?php echo $note['description']?></p>
            <p class="ms-5"><?php echo $note['date_created']?></p>
            <form class="me-3 ms-3" style="display: inline-block;" method="GET" action="Notes/EditNote.php">
                    <input type="hidden" name=id value="<?php echo $note['id'];?>" >
                    <button class="btn btn-outline-primary btn-sm"  type="submit">Edit</button>
            </form>
            <form action="Notes/DeleteNote.php<?php echo $note['id']; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
            </form> 
       </div> <hr>
        
    <?php endforeach; ?>

</section>
    
</div>


