<?php
    include 'Includes/Header.php';
    include_once '../DB/UserManagement.php';

    $manage = new ManageUsers();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $row = $manage->user_login($username, $password);

      $_SESSION['username']= $username;
      $_SESSION['password']= $password;

      if($row > 0) {          
          $_SESSION['start'] = time();
          $_SESSION['expire'] = $_SESSION['start'] + (10*60);
          $message[] = "Login successfull";

          header("Location:../");
        }

      } else{
        $message[] = "Invalid Credentials";
      }
    
?>


<section id="login" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div >
            <a href="../">
               <i class="fas fa-arrow-left"></i>
            </a>

            <div class="details text-center">
              <h3>Sign into your account</h3>
            <div class="card-body">
              <?php foreach($message as $mess): ?>
                <div class="alert alert-danger" role="alert">
                    <p> <?php echo $mess; ?> </p>
                  </div>
              <?php endforeach;?>

                <form method="POST" class="p-3">

                <div class="form-group">
                  <input type="text" name="username" class="form-control mb-4" required placeholder="Username">
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-sm"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="Register.php"
                      class="link-danger">Register</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>