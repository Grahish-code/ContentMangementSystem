<?php include "dp.php"  ?>
<?php session_start(); ?>


<?php

if(isset($_POST['login'])){
     $username=$_POST['username'];
     $password=$_POST['password'];

     $username=mysqli_real_escape_string($connection,$username);
     $password=mysqli_real_escape_string($connection,$password);
     


    //  the above two line is to protect our website from the hackers , as there are some values which when given to the datbase , the database get corrupted and if the hacker put that values in the username box , and if directly send that value to the database our database will be correpted , so instead of direclty sedning it to the database we first kind of purify the value entered by user by applying above inbuild function mysqli_real_escape_string();

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection,$query);

    if(!$select_user_query){
        die("QUERY FAILED".mysqli_error($connection));

    }

    while($row = mysqli_fetch_array($select_user_query)){
        // yeh jouper wali line hai iska matlab dhyan se smaj sabse phele humne ek query banai(line 16) uss query me humne apne datbase ki sari values ko store kar liya or unn sari values ko dal diya $select_user_query ek variable me ab kyuki humare pas ek varaible me bhaut sari value hai to hum array ko use karge , to humne $select_user_query ko rows me store kiya as a araay ab hume usme jo bhi values chaiye wo hum array ki tarah call karke le le lenge ex($row['user_id'])
       $db_user_id=$row['user_id'];
       $db_username=$row['username'];
       $db_user_password=$row['user_password'];
       $db_user_firstname=$row['user_firstname'];
       $db_user_lastname=$row['user_lastname'];
       $db_user_role=$row['role'];
    }





 if (password_verify($password,$db_user_password)){

    $_SESSION['username']=$db_username;
    $_SESSION['firstname']=$db_user_firstname;
    $_SESSION['lastname']=$db_user_lastname;
    $_SESSION['role']=$db_user_role;



    header("Location: ../admin");
}else{
    header("Location: ../index.php");
}


}
?>