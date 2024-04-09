<?php
if(isset($_POST['create_post'])){

    $post_Ttile = $_POST['title'];
    $post_user = $_POST['post_user'];
    $post_Category = $_POST['post_category'];
    $post_Status = $_POST['post_status'];


    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    
    $post_Tags = $_POST['post_tags'];
    $post_Content = $_POST['post_content'];
    $post_Date = date('d-m-y');
   
    //uper hum kya kar rahe hai niche humne ek form banaya hai jaha humne alag alag input text ko alag nam diya hai , so what we are doing is jo bhi value hum uss form me dal rahe hai uske hum uper ke codes ke through variable me store kar rahe hai for example :- $post_Title=$POST_['title'] iss code ka matlab hai ki jo bhi from maine niche banmaya hai uske kisi to ek inout ka name title hoga , uss input pe user jo bhi value post kar raha hai usko $post_Title me jake store kar do 

    move_uploaded_file($post_image_temp, "../images/$post_image");
    //jo image humne form me upload ki hai usko save kaha karna hai yeh uper wala code bata raha hai 

    $query = "INSERT INTO posts(post_category_id,post_title,post_user,post_date,post_image,post_content,post_tags,post_status) ";

    $query.=
    "VALUES({$post_Category},'{$post_Ttile}','{$post_user}',now(),'{$post_image}','{$post_Content}','{$post_Tags}','{$post_Status}' )";

    $create_post_query=mysqli_query($connection,$query);

    confirmQuery($create_post_query);
    echo "<p class='bg-success'> POST CREATED  </a> </p>";


}
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
</div>

<div class="form-group">
    <label for="category">Category</label>
    <select name="post_category" id="post_category">

    <!-- here we have added php so that we can dynamiclly add category from the database -->
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

<!-- <div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="author">
</div> -->

<div class="form-group">
    <select name="post_status" id="">
        <option value="Post Status">Select Option</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
    </select>
    
</div>

<div class="form-group">
    <label for="post image">Post Image</label>
    <input type="file" name="image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish" method=
    "Post">
</div>
</form>