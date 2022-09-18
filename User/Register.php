<?php
  include 'Includes/Header.php';
  include_once '../DB/UserManagement.php';
 
   $manage = new ManageUsers();
   $errors = [];
   $date = date('Y-m-d H:i:s');

   function random_string($n){
     $Characters = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
     $Str = '';

     for($i = 0; $i<=$n; $i++){
       $index = rand(0,strlen($Characters)-1);
       $Str .= $Characters[$index];

     }
     return $Str;
     }

   if($_SERVER['REQUEST_METHOD']==='POST'){
    
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password2 = $_POST['password2'];
      $imagePath = '';

      $same_email = $manage->email_exists($email) ?? null ;
      $same_username = $manage->username_exists($username) ?? null;
 
     if(!$same_email){
        if(!$same_username){
            if($password==$password2){
                if(empty($errors)){
                  $profile = $_FILES['profile'] ?? null;
                  if($profile && $profile['tmp_name']){
                    if($profile){
     
                      $imagePath = 'static/images/profiles/'.random_string(8).'/'.$profile['name'];
                      mkdir(dirname($imagePath));
                      move_uploaded_file($profile['tmp_name'], $imagePath);    
                    }
                  }

                 $manage = new ManageUsers();
                 $manage->user_registration($username, $email, $password, $date, $imagePath);
                 header('Location:Login.php');
              }
     
            }
            else{
              $errors[] = "Passwords don't match";
            }
    
        }else{
           $errors[] = 'Username already exists';
        }

     }else{
        $errors[] = 'Email already exists';
     }
 }

?>

<section class="vh-100">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">

          <a class="m-2" href="../">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div class="card-body pb-1">
              <p class="text-center display-6 mb-1">Create an account</p>


                <?php foreach ($errors as $error): ?>
                  <div class="alert alert-danger" role="alert">
                    <p> <?php echo $error; ?> </p>
                  </div>

                <?php endforeach; ?>


              <form method="POST" enctype="multipart/form-data">

                <div class="form-outline mb-3">

                  <input type="text" name="username" class="form-control form-control-sm" placeholder="Username" required/>

                </div>

                <div class="form-outline mb-3">

                  <input type="email" name="email" class="form-control form-control-sm" placeholder="@example@gmail.com" required/>

                </div>

                <div class="form-outline mb-3">

                  <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" required/>

                </div>

                <div class="form-outline mb-3">

                  <input type="password" name="password2" class="form-control form-control-sm" placeholder="Repeat Password" required/>

                </div>

                <div class="form-outline mb-3">
                  <label class="form-label" for="password2">Profile:</label>
                  <input type="file" name="profile" class="form-control form-control-sm" />

                </div>


                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-sm"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="Login.php"
                      class="link-danger">Login</a></p>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
