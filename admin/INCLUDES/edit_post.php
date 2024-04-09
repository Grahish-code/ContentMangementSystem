<?php

if(isset($_GET['p_id'])){
    $post_id = $_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id={$post_id}";
    $select_post_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_id = $row['post_id'];
        $post_user = $row['post_user'];
        $post_Ttile = $row['post_title'];
        $post_Category = $row['post_category_id'];
        $post_Status = $row['post_status'];
        $post_Image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_Tags = $row['post_tags'];
        $post_Comments = $row['post_comments_count'];
        $post_Date = $row['post_date'];
    
    }

    if(isset($_POST['Update_post'])){

        $post_user = $_POST['author'];
        $post_Ttile = $_POST['title'];
        $post_Category = $_POST['post_category'];
        $post_Status = $_POST['post_status']; 
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_Content = $_POST['post_content'];
        $post_Tags = $_POST['post_tags'];
       
    move_uploaded_file($post_image_temp, "../images/$post_image");
    //jo image humne form me upload ki hai usko save kaha karna hai yeh uper wala code bata raha hai 

    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id=$post_id ";
        $select_image=mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($select_image)){
            $post_image=$row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .="post_title = '{$post_Ttile}', ";
    $query .="post_category_id = '{$post_Category}', ";
    $query .="post_date = now(), ";
    $query .="post_user = '{$post_user}', ";
    $query .="post_status = '{$post_Status}', ";
    $query .="post_tags = '{$post_Tags}', ";
    $query .="post_content = '{$post_Content}', ";
    $query .="post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$post_id} ";
    
    $update_post = mysqli_query($connection,$query);
    confirmQuery($update_post);
    echo "<p class='bg-success'> POST UPDATED . <a href='../post.php?p_id={$post_id}'> View Post </a> </p>";
    // understand the above href here i dont want that once user click of view page then he or she should see the whole post.php page but i want that it should be able to see only that specific post from post.php in which post he have clicked that view post button thats why we are pass the id of the post 

}
}

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_Ttile ?>" type="text" class="form-control" name="title">
</div>


<div class="form-group">
<label for="categories">Categories</label>
    <select name="post_category" id="post_category">

    <!-- here we have added php so that we can dynamiclly select edit our category from the database -->
        <?php
        $query = "SELECT * FROM categories ";
        $select_categories = mysqli_query($connection, $query);
        confirmQuery($select_categories);
        while ($row = mysqli_fetch_assoc($select_categories)) {            
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        
        }
        ?>


    </select>
</div>



<!-- <div class="form-group">
    <label for="title">Post Author</label>
    <input value="<?php //echo $post_user ?>" type="text" class="form-control" name="author">
</div> -->

<div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id="">

    <!-- here we have added php so that we can dynamiclly add category from the database -->
        <?php
        $query = "SELECT * FROM users ";
        $select_users = mysqli_query($connection, $query);
        confirmQuery($select_users);
        while ($row = mysqli_fetch_assoc($select_users)) {            
            $user_id= $row['user_id'];
            $username = $row['username'];
            echo "<option value='{$username}'>{$username}</option>";
        }
        ?>


    </select>
</div>

<div class="form-group">
<select name="post_status" id="">

<option value='<?php  $post_Status ?>'><?php echo $post_Status; ?></option>

<?php

if($post_Status=='published'){

    echo "<option value='draft'>Draft</option>";
}else{
    echo "<option value='published'>Publish</option>";
 
}
?>
</select>
</div>

<!-- <div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="//<?php echo $post_Status ?>//" type="text" class="form-control" name="post_status">
</div> -->



<div class="form-group">

    <label for="post image">Post Image</label>
    <input type="file" name="image">
    <img width="100" src="../images/<?php echo $post_Image;?> " alt="">

</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_Tags ?>" type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea  class="form-control" name="post_content" id="summernote" cols="30" rows="10"><?php echo $post_content ?></textarea>

</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="Update_post" value="Update Post" method=
    "Post">
</div>
</form>