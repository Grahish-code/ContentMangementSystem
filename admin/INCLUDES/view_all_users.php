<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>UserName</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>ROLE</th>
          
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $select_user = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_user)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $role = $row['role'];
            


            echo "<tr>";
            echo "<td>$user_id </td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$role</td>";
            



            // see in this below line from 49-58 what we want ki user jab view all comment pe jaye to wo dekh sake konsa comment kis post ke liye kiya gaya hai or yeh hume dynamic way me karna hai to dhyan se sun hum kya kar rahe hai hume ek comment_post_id banai hai jo post_id ke equal hai matlab ki agar miane dsa course pe comment kiya hai to dsa ki comment_post_id me wo value store ho jaygei ki jo dsa ki post_id me hai , ab aisa humne kyu kiya wo sun , ab iss post_id ke thorugh hume post_title mil jayega jisse hum directly apne view all comment ki table me show kar sakte hai , ab yeh jo bhi miane uper likha hai issi ko coding ki language me niche code kiya hua hai , dhyan se padega to smaj jayega 

            // $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";

            // $select_post_id_query = mysqli_query($connection, $query);

            // while ($row = mysqli_fetch_assoc($select_post_id_query)) {
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];

            //     echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }

            
            echo "<td><a href='user.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href='user.php?change_to_sub={$user_id}'>Subscriber</a></td>";
            echo "<td><a href='user.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
            echo "<td><a href='user.php?delete={$user_id}'>Delete</a></td>";

            echo "</tr>";
        }
        ?>


    </tbody>

</table>
<?php

if (isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET role = 'Admin' WHERE user_id = {$the_user_id} ";
    $admin_query = mysqli_query($connection, $query);
    header("Location: user.php");
}

if (isset($_GET['change_to_sub'])) {
    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET role = 'Subscriber' WHERE user_id = {$the_user_id} ";
    $approve_query = mysqli_query($connection, $query);
    header("Location: user.php");
}


if (isset($_GET['delete'])) {
    if(isset($_SESSION['role'])){
        if($_SESSION['role']=='admin'){
    
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: user.php");
        }
}
}
?>