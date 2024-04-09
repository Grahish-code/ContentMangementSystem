<?php
if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $checkBoxValue)
    $bulk_options=$_POST['bulk_options'];
    
    switch($bulk_options){
        case'published':
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id={$checkBoxValue}";
            $update_to_published_status = mysqli_query($connection,$query);
            confirmQuery($update_to_published_status);
            break;

            case'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id={$checkBoxValue}";
                $update_to_draft_status = mysqli_query($connection,$query);
                confirmQuery($update_to_draft_status);
                break;

                case'delete':
                    $query = "DELETE FROM posts WHERE post_id={$checkBoxValue}";
                    $update_to_delete_status = mysqli_query($connection,$query);
                    confirmQuery($update_to_delete_status);
                    break;
    }
    
}
?>


<form action="" method='post'>
<table class="table table-bordered table-hover">
    <div id="bulkOptionContainer" class="col-xs-4">
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply" >

        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>
   

    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Users</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM posts ORDER BY post_id DESC";
        $select_post = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_post)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_user = $row['post_user'];
            $post_Ttile = $row['post_title'];
            $post_Category = $row['post_category_id'];
            $post_Status = $row['post_status'];
            $post_Image = $row['post_image'];
            $post_Tags = $row['post_tags'];
            $post_Comments = $row['post_comments_count'];
            $post_Date = $row['post_date'];

            echo "<tr>";
            ?>
<td><input class="checkBoxes" type="checkbox" name='checkBoxArray[] ' value="<?php echo $post_id ?>" ></td>
            <?php
            echo "<td>$post_id </td>";


if(isset($post_author) || !empty($post_author)){
            echo "<td>$post_author</td>";
}elseif(isset($post_user) || !empty($post_user)){
    echo "<td>$post_user</td>";
}




            echo "<td>$post_Ttile</td>";

            //here we have updated category dynamic way
            // again grahihs iss chiz ko dhyan se smaj yaha view all post me hum course ki sari detail print karrahe the now see agar 20 course hai to 10 author honge 10 title hoga 10 image hogi lekin category wo to ustni hi honge jitni database me store hai 2-3 course same category ko belong kar sakte hai , to ab pata kaise karege ki konse course ki category id konsi hai . to yeh decide karta hain post_category_id jo hume har post/course ko di hai , 


            $query = "SELECT * FROM categories WHERE cat_id = {$post_Category}";
            $select_categories_id = mysqli_query($connection, $query);

            // to category hum kaise print karege categories database me jayege usme shirf uss cat_id pe jayege jo humari post_cat_id ke equal hoga , to hume har ek cat_id pe jake check karna padega ki iski cat_id or humari cat_id match ho rahi hai ya nahin or jaha match ho jaye waha below instrocution ko run kar do isliye yaha hume while loop ko use kiya 
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<td>{$cat_title}</td>";
            }

            echo "<td>$post_Status</td>";
            echo "<td><img width='100' src='../images/$post_Image' alt='images'></td>";
            echo "<td>$post_Tags</td>";

           $query="SELECT * FROM comments WHERE comment_post_id=$post_id";
           $send_comment_query=mysqli_query($connection,$query);
           $count_comments=mysqli_num_rows($send_comment_query);


            echo "<td>$count_comments</td>";





            echo "<td>$post_Date</td>";
            echo "<td><a href=../post.php?p_id={$post_id}>View Post</a></td>";

            echo "<td><a href=posts.php?source=edit_post&p_id={$post_id}>Edit</a></td>";

            echo "<td><a onClick=\"javascript: return confirm('Are you Sure you want to delete user');\" href='posts.php?delete={$post_id}'>Delete</a></td>";


            echo "</tr>";
        }
        ?>


    </tbody>

</table>
</form>
<?php

if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location:posts.php");
}
?>