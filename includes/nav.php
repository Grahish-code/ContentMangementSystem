<?php
include "dp.php"
?>
<?php session_start(); ?>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

            
<?php
//  <!-- yeh niche jo query likhi hai yeh mere database me jake ke category me jake cat_title me jo bji hai usko fetch karke mere page me display kar rahi hai -->

                $query="SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($select_all_categories_query)){
                    $cat_title=$row['cat_title']; 
                    $cat_id=$row['cat_id'];
                   // iss line ka matlab hai ki maine row select uper wali line se , lekin muje puri row thori display karni hai uss row me jo bhi value , cat_title(database check kar ) ke under hai shrif usko print karna hai to yeh line wahi kar rahi hai , ki row me se shrif wo value utha rahi hai jo cat_title colum ke under hai or usko $cat_tiltle varaible me store kar rahi hai 

$category_class='';
$registration_class='';
$pageName= basename($_SERVER['PHP_SELF']);
$registration='registration.php';

// The PHP_SELF is a function whixh give the name of the page in which the user is for exampl if the user open category page the php_self will show the category page , if it user open index page then the php_self will be the index page 

if(isset($_GET['category']) && $_GET['category']== $cat_id){
    $category_class='active';
}else if($pageName==$registration){
    $registration_class='active';
}

                    echo "<li class='$category_class'> <a href='category.php?category=$cat_id'>{$cat_title}</a> </li>"; // yeh line display kar rahi hai hai 
                }
?>

                    <li>
                        <a href="admin">Admin</a>
                    </li>

                    

                    <li  class='<?php echo $registration_class ?>'>
                        <a href="registration.php">Registration</a>
                    </li>
                 

                    <li>
                        <a href="./contact.php">Contact</a>
                    </li>
                    
                    <?php

                    if(isset($_SESSION['username'])){
                        if(isset($_GET['p_id'])){
                            $the_post_id=$_GET['p_id'];
                            echo"<li> <a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a> </li>";

                        }
                    }

                    ?> 

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
