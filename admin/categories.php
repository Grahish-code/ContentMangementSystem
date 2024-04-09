<?php include "INCLUDES/admin_header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "INCLUDES/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome to Admin Page
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">

                            <?php
                           insert_categories();
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
<?php
                            if(isset($_GET['edit'])){
                                $cat_id=$_GET['edit'];
                                include "INCLUDES/edit_categories.php";
                            }
     ?>                       
                        </div> <!-- Add Category Form -->

                        <div class="col-xs-6">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php //FIND ALL CATEGORY QUERY         

                                   getAllCategories();
                                    ?>

                                    <?php // DELETE QUERY

                                    delete();
                                    ?>



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "INCLUDES/admin_footer.php" ?>