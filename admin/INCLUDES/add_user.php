<?php
if(isset($_POST['create_user'])){

    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];


    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    
    
    $username = $_POST['Username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $username=mysqli_real_escape_string($connection,$username);
    $user_password=mysqli_real_escape_string($connection,$user_password);

    $encrypted_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost' => 12));




   
    //uper hum kya kar rahe hai niche humne ek form banaya hai jaha humne alag alag input text ko alag nam diya hai , so what we are doing is jo bhi value hum uss form me dal rahe hai uske hum uper ke codes ke through variable me store kar rahe hai for example :- $post_Title=$POST_['title'] iss code ka matlab hai ki jo bhi from maine niche banmaya hai uske kisi to ek inout ka name title hoga , uss input pe user jo bhi value post kar raha hai usko $post_Title me jake store kar do 
    // move_uploaded_file($post_image_temp, "../images/$post_image");
    // //jo image humne form me upload ki hai usko save kaha karna hai yeh uper wala code bata raha hai 

    $query = "INSERT INTO users(user_firstname,user_lastname,role,username,user_email,user_password) ";

    $query.=
    "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$encrypted_password} ') ";

    $create_user_query=mysqli_query($connection,$query);

    confirmQuery($create_user_query);
    echo "New-User has been added Succesfully , WELCOME TO CMS" . " " . "<a href='user.php'>View Users </a>";


}
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">FirstName</label>
    <input type="text" class="form-control" name="user_firstname">
</div>
<div class="form-group">
    <label for="title">LastName</label>
    <input type="text" class="form-control" name="user_lastname">
</div>
 
<div class="form-group">
    <select name="user_role" id="">
<option value="subscribers">Select Options</option>
  <option value="admin">Admin</option>
  <option value="subscribers">Subscribers</option>


    </select>
</div>
<!-- <div class="form-group">
    <label for="post image">Post Image</label>
    <input type="file" name="image">
</div> -->

<div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="Username">
</div>

<div class="form-group">
    <label for="post_status">Email</label>
    <input type="email" class="form-control" name="user_email">
</div>



<div class="form-group">
    <label for="post_tags">Password</label>
    <input type="password" class="form-control" name="user_password">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User" method=
    "Post">
</div>
</form>