<?php include "INCLUDES/admin_header.php" ?>
<?php
if(isset($_SESSION['username'])){
    $username =$_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query=mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($select_user_profile_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $role = $row['role'];
    }
    
}
?>

<?php

if(isset($_POST['edit_user'])){

    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];


    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    
    
    $username = $_POST['Username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // $post_Date = date('d-m-y');
   
    //uper hum kya kar rahe hai niche humne ek form banaya hai jaha humne alag alag input text ko alag nam diya hai , so what we are doing is jo bhi value hum uss form me dal rahe hai uske hum uper ke codes ke through variable me store kar rahe hai for example :- $post_Title=$POST_['title'] iss code ka matlab hai ki jo bhi from maine niche banmaya hai uske kisi to ek inout ka name title hoga , uss input pe user jo bhi value post kar raha hai usko $post_Title me jake store kar do 

    // move_uploaded_file($post_image_temp, "../images/$post_image");
    // //jo image humne form me upload ki hai usko save kaha karna hai yeh uper wala code bata raha hai 

    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="role = '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_password = '{$user_password}' ";
    $query .= "WHERE username = '{$username}' ";
    
    $edit_user_query = mysqli_query($connection,$query);
    confirmQuery($edit_user_query);

}
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "INCLUDES/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                    <h1 class="page-header">
                            Welcome to Admin Page
                            <small>Author</small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">FirstName</label>
    <input type="text" value="<?php echo  $user_firstname ?>" class="form-control" name="user_firstname">
</div>
<div class="form-group">
    <label for="title">LastName</label>
    <input type="text" value="<?php echo  $user_lastname ?>" class="form-control" name="user_lastname">
</div>
 


<div class="form-group">
    <select name="user_role" id="">
<option ><?php echo  $role  ?></option>
<?php
if($role == 'Admin'){
   echo "<option value='subscribers'>Subscribers</option> ";
}
else{
  echo " <option value='admin'>Admin</option>  ";
}

?>

 </select>
</div>



<!-- <div class="form-group">
    <label for="post image">Post Image</label>
    <input type="file" name="image">
</div> -->

<div class="form-group">
    <label for="title">Username</label>
    <input type="text" value="<?php echo  $username ?>" class="form-control" name="Username">
</div>

<div class="form-group">
    <label for="post_status">Email</label>
    <input type="email" value="<?php echo  $user_email ?>" class="form-control" name="user_email">
</div>



<div class="form-group">
    <label for="post_tags">Password</label>
    <input type="password" value="<?php echo  $user_password ?>" class="form-control" name="user_password">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile" method=
    "Post">
</div>
</form>
                      
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "INCLUDES/admin_footer.php" ?>