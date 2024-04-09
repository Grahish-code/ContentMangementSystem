
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


if(isset($_GET['category'])){
    $post_category_id = $_GET['category'];




$query ="SELECT * FROM posts  WHERE post_category_id=$post_category_id AND post_status='published'" ;
$select_all_post_query = mysqli_query($connection,$query);

if(mysqli_num_rows($select_all_post_query)<1){
    echo "<h1 class='text-center' >NO POST AVAILABLE</h1>";

}else{

while($row=mysqli_fetch_assoc($select_all_post_query)){
    $post_id=$row['post_id'];
    $post_title=$row['post_title']; 
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];

    // uper maine varaible me jo bhi stire kiya hai wo kya hai let see that :-
    // maine kuch nahi kiya sabke phele maine $row varaible me apne database ki sari row ko store kar diya uske bad ab muje pura database ko to print karna nahin hai ume se kuch values ko print karna hai , to mai kya hu (database side by side dekhte rehna tab or ache se samjega mere database me bahut sari columns hai lekin muje to mai kya kar raha hu har row ke kuch specific coloum ko print kar raha hu jaise ki :- $row['post_title'] iss line me maine kya kiya mai row me gaya uske bad jis colum ka nam 'post_title' hai shrif ussi ki value uthai or uske $post_title iss variable me store kar diya )

?>
  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->

<h2>
                    <a href="post.php?p_id= <?php echo $post_id; ?>"><?php echo $post_title ?></a>
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

<?php } } } else{

header('Location: index.php');

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