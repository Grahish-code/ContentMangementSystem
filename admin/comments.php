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

                      <?php
                      
                      if(isset($_GET['source'])){
                        $source = $_GET['source'];

                      }
                      else{
                        $source='';
                      }
                      switch($source){
                        case 'add_post';
                        include "INCLUDES/add_post.php";
                        break;
                        case 'edit_post';
                        include "INCLUDES/edit_post.php";
                        break;
                        case '200';
                        echo "nice 200";
                        break;
                        default:
                        include "INCLUDES/view_all_comments.php";
                        
                        break;

                      }
                      ?>
                    

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "INCLUDES/admin_footer.php" ?>