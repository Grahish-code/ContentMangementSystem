<?php
include "includes/dp.php"
?>


<?php
include "includes/header.php"
?>


<body>

    <!-- Navigation -->
    <?php
    include "includes/nav.php"
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">






<?php
// dekh grahish thora sa iq laga tu jab koi chiz search kar raha hai to tera page change nahi ho raha hai sab kuch waisa ka waisa hai bas ab kya ho raha , jo tune search kiya hai shrif uske realted courses tuje dikh rahe hai baki nahi dikh rahe haiaisa isliye kyuki yaha pe tune query ko halka sa change kiya hai , isse phele tu query me dal raha tha post me jo bhi hai sab show kar do , ab tu kya hai post me jo hai usme se shrif wahi show karo jinka post_tag(database value) user ke search kiya huhye text se match kar raha hai , to ab shrof wahi display hoga 

if(isset($_POST['submit'])){
     $search =  $_POST['search'];
     $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
     $Search_query = mysqli_query($connection,$query);

     if(!$Search_query){
        die("Query Failed". mysqli_error($connection) );
     }

     $count= mysqli_num_rows($Search_query);
     if($count==0){
      echo "<h1>No Result Found</h1>";
     }
     else{


        // $query ="SELECT * FROM posts";
        // $select_all_post_query = mysqli_query($connection,$query);
        
        while($row=mysqli_fetch_assoc($Search_query)){
            $post_title=$row['post_title'];
            $post_author=$row['post_author'];
            $post_date=$row['post_date'];
            $post_image=$row['post_image'];
            $post_content=$row['post_content'];
        
        ?>
        
         <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>
        
                        <!-- First Blog Post -->
        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>"alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        
                        <hr>
        
        <?php } 
     }

}
?>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
            include "includes/side.php"
            ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php
        include "includes/footer.php"
        ?>