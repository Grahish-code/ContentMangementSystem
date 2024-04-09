<?php  include "includes/dp.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php include "admin/function.php";?>
 <?php
 if(isset($_POST['submit'])){

        $username=$_POST['username'];
        $Email=$_POST['email'];
        $password=$_POST['password'];
     


        if(userexist($username) || (emailexist($Email)) )   {

            $message='user already exist';

        }
        else{

        $username=mysqli_real_escape_string($connection,$username);
        $Email=mysqli_real_escape_string($connection,$Email);
        $password=mysqli_real_escape_string($connection,$password);


//passwrod encryptinmg 
        // $query = "SELECT randSalt FROM users";
        // $select_randSalt_query= mysqli_query($connection,$query);

        // if(!$select_randSalt_query){
        // die("QUERY FAILED". mysqli_error($connection));
        // }
        //     $row = mysqli_fetch_array($select_randSalt_query);
        //     $salt = $row['randSalt'];
        //     $password = crypt($password,$salt);

        $encrypted_password=password_hash($password,PASSWORD_BCRYPT,array('cost' => 12));


            
         

             $query = "INSERT INTO users (username,user_email,user_password,role) ";
            $query.= "VALUES('{$username}','{$Email}','{$encrypted_password}', 'subscriber') ";

            $registration_user_query=mysqli_query($connection,$query);
            $message='Account created Successfully';
            if(!$registration_user_query){
                die("QUERY FAILED". mysqli_error($connection) . ' ' .
                mysqli_errno($connection));

               
            }
        

        Dlogin($username,$password);
        } 

 }
 
 ?>


    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
            <?php   if(isset($_POST['submit'])){

                echo $message;

            } ?>

                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required value="<?php echo isset($username) ? $username : '' ?>";>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required value="<?php echo isset($Email) ? $Email : '' ?>";>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required >
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
