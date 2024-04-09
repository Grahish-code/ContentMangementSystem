
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
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page ="";
}
if($page == "" || $page==1){
    $page_1=0;
}else{
    $page_1= ($page * 3) - 3;
}



$post_query_count="SELECT * FROM posts WHERE post_status='published' ";
$find_count=mysqli_query($connection,$query);
$count=mysqli_num_rows($find_count);

if($count<1){
    echo "<h1 class='text-center' >NO POST AVAILABLE</h1>";
}else{

$count =ceil($count/3);




$query ="SELECT * FROM posts LIMIT $page_1, 3";
$select_all_post_query = mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_all_post_query)){
    $post_id=$row['post_id'];
    $post_title=$row['post_title']; 
    $post_user=$row['post_user'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=substr($row['post_content'],0,50);
    //
    $post_Status=$row['post_status'];

   
    
  

    

    // uper maine varaible me jo bhi store kiya hai wo kya hai let see that :-
    // maine kuch nahi kiya sabke phele maine $row varaible me apne database ki sari row ko store kar diya uske bad ab muje pura database ko to print karna nahin hai ume se kuch values ko print karna hai , to mai kya hu (database side by side dekhte rehna tab or ache se samjega mere database me bahut sari columns hai lekin muje to mai kya kar raha hu har row ke kuch specific coloum ko print kar raha hu jaise ki :- $row['post_title'] iss line me maine kya kiya mai row me gaya uske bad jis colum ka nam 'post_title' hai shrif ussi ki value uthai or uske $post_title iss variable me store kar diya )
?>

<!-- yeh jo maine uper kiya yeh kyu kiya :-
ab kya hua hai ki maine ab direct apne database ke under jo value hai usko ek varible me store kar diya hai , ab muje khabhi apne database ki koi value print karni hai to mai direct uss varible ko call kar dunga jaha maine usko store kiya hai
-->

  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->

<h2>
<a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo htmlspecialchars($post_title); ?></a>

                    <!-- jo maine uper comment me likha hai wo yaha show kiya hai -->
                </h2>
                <p class="lead">
                    by <a href="author.php?author=<?php echo $post_user ?>&p_id=<?php echo $post_id;?>"><?php echo $post_user ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>"alt="">
                <hr>
                </a>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php } }  ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
            include "includes/side.php"
            ?>

        </div>
        <!-- /.row -->

        <hr>
        <ul class="pager">

        <?php
        for($i=1;$i<=$count;$i++){
echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
        }
        ?>
        </ul>

        <?php
        include "includes/footer.php"
        ?>