<?php


function confirmQuery($result){
    global $connection;
    if(!$result){
        die ("Query Failed".mysqli_error($connection));
        // throw new Exception("error");
    }
}
function insert_categories(){
    global $connection;
 if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    // jaha user search kar raha hain uss input ka nam cat_title hai so this line means ki jo bhi value vhaa post ho rahi hai usko $cat_title name ke varaible me store kar do 

    if ($cat_title == "" || empty($cat_title)) {
        echo "This Flied should not be Empty";
    } else {
        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUE ('{$cat_title}') ";

        $create_category_query = mysqli_query($connection, $query);
        // mysqli_query($connection, $query) this command is used to execute the query

        if (!$create_category_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    }
}
}

function getAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        // iss line ka matlab hai ki maine row select uper wali line se , lekin muje puri row thori display karni hai uss row me jo bhi value , cat_title(database check kar ) ke under hai shrif usko print karna hai to yeh line wahi kar rahi hai , ki row me se shrif wo value utha rahi hai jo cat_title colum ke under hai or usko $cat_tiltle varaible me store kar rahi hai 

        echo "<tr>";
        echo "<td>{$cat_id} </td>";
        echo "<td>{$cat_title} </td>";
        echo "<td> <a href='categories.php?delete={$cat_id}'>Delete</a>  </td>";
        echo "<td> <a href='categories.php?edit={$cat_id}'>UPDATE</a> </td>";
        echo "</tr>";

        // ek row me do data hai 
    }
}


function delete(){
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);

        header("Location:categories.php");
        // // this line we have add to refresh the page , the reason for that is jaise hi humne delete click kiya , value delete to ho gai lekin wo value hatata nahi hai kyuki page refresh karne ki jarurat hai jaise hi refresh karege value delete ho jaygei 

    }
}



function is_admin($username){
    global $connection;

    $query ="SELECT role FROM users WHERE username='$username'";
    $result=mysqli_query($connection,$query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);
    if($row['role']=='Admin'){
        return true;
    }else{
        return false;
    }
}

function userexist($username){
    global $connection;
    $query ="SELECT username FROM users WHERE username='$username'";
    $result=mysqli_query($connection,$query);
    confirmQuery($result);

    if(mysqli_num_rows($result)>0){
        return true;
    }
    else{
        return false;
    }
}



function emailexist($email){
    global $connection;
    $query ="SELECT username FROM users WHERE user_email='$email'";
    $result=mysqli_query($connection,$query);
    confirmQuery($result);

    if(mysqli_num_rows($result)>0){
        return true;
    }
    else{
        return false;
    }
}

function Dlogin($username,$password){
    global $connection;

    // $username=$_POST['username'];
    // $password=$_POST['password'];

    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    


   //  the above two line is to protect our website from the hackers , as there are some values which when given to the datbase , the database get corrupted and if the hacker put that values in the username box , and if directly send that value to the database our database will be correpted , so instead of direclty sedning it to the database we first kind of purify the value entered by user by applying above inbuild function mysqli_real_escape_string();

   $query = "SELECT * FROM users WHERE username = '{$username}' ";
   $select_user_query = mysqli_query($connection,$query);

   if(!$select_user_query){
       die("QUERY FAILED".mysqli_error($connection));

   }

   header("Location: /CMS/admin");

}

?>