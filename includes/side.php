

<div class="col-md-4">






<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
   </form>
    <!-- /.input-group -->
</div>

<!-- Login -->
<div class="well">

    <?php if(isset($_SESSION['role'])): ?>

        <h4>Welcome <?php echo $_SESSION['username'] ?> </h4>
        <a href="includes/logout.php" class="btn btn-primary">Logout</a>
    <?php else: ?>

    <h4>LogIn</h4>
    <form action="includes/login.php" method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Enter User Name">
       
    </div>
    <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Enter Password please">
        <span class="input-group-btn">
            <button class="btn btn-primary" name="login" type="submit" >Submit</button>
        </span>
       
    </div>


   </form>

    <?php endif; ?>

    <!-- /.input-group -->
</div>







<!-- Blog Categories Well -->
<div class="well">

<?php
                $query="SELECT * FROM categories";
                $select_categories_side = mysqli_query($connection,$query);
?>




    <h4>Blog Categories</h4>
    <div class="row">
        <!-- /.row -->
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php
            // yaha ache se smaj maine kya kiya hai muje mere database se value utha ke direct Blog category me dalna hai to ab mere database me to bahut sari value hai to usko un sab ko store karke display karna hai , that's why here we are using while loop which says tab tak value fetch karo jab tak databse me value hai , to usne pheli database value ko print kiya , phir check kiya database me or value hai agar ha to usko print kiya nahi to ruk jao 

                while($row=mysqli_fetch_assoc($select_categories_side)){
                    $cat_title=$row['cat_title']; 
                    $cat_id=$row['cat_id']; 
                    // inn line ka matlab hai ki maine row select uper wali line se , lekin muje puri row thori display karni hai uss row me jo bhi value , cat_title(database check kar ) ke under hai shrif usko print karna hai to yeh line wahi kar rahi hai , ki row me se shrif wo value utha rahi hai jo cat_title colum ke under hai or usko $cat_tiltle varaible me store kar rahi hai 
                    
                    
                    echo "<li> <a href='category.php?category=$cat_id'> {$cat_title} </a> </li>";
                    //to print the line , yaha ek chiz or dekh miane link me kya add kiya hai tu jaise hi kisi cat_title pe click karega to wo link tuje directly database ke id ko search kar degi usse kya hoga jitne bhi course uss category ke hai shrif wahi display honge inshory category.php page open ho jayega usme bhi jo category id hogi wo hi open hogi
                }
?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>






<!-- Side Widget Well -->
<?php  include "widget.php";?>

</div>
