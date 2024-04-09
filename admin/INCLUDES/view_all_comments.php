<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>UnApprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM comments";
        $select_comment = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_comment)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<td>$comment_id </td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";


            // see in this below line from 49-58 what we want ki user jab view all comment pe jaye to wo dekh sake konsa comment kis post ke liye kiya gaya hai or yeh hume dynamic way me karna hai to dhyan se sun hum kya kar rahe hai hume ek comment_post_id banai hai jo post_id ke equal hai matlab ki agar miane dsa course pe comment kiya hai to dsa ki comment_post_id me wo value store ho jaygei ki jo dsa ki post_id me hai , ab aisa humne kyu kiya wo sun , ab iss post_id ke thorugh hume post_title mil jayega jisse hum directly apne view all comment ki table me show kar sakte hai , ab yeh jo bhi miane uper likha hai issi ko coding ki language me niche code kiya hua hai , dhyan se padega to smaj jayega 

            $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";

            $select_post_id_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];

                echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }

            echo "<td>$comment_date</td>";
            echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove=$comment_id'>UnApprove</a></td>";
            echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";

            echo "</tr>";
        }
        ?>


    </tbody>

</table>
<?php

if (isset($_GET['unapprove'])) {
    $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$the_comment_id} ";
    $unapprove_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}

if (isset($_GET['approve'])) {
    $the_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id} ";
    $approve_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}


if (isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}
?>