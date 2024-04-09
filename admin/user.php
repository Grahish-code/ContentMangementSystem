<?php include "INCLUDES/admin_header.php" ?>



<?php
if(!is_admin($_SESSION['username'])){
  header("Location:index.php");
}
?>




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
                        case 'add_user';
                        include "INCLUDES/add_user.php";
                        break;
                        case 'edit_user';
                        include "INCLUDES/edit_user.php";
                        break;
                        case '200';
                        echo "nice 200";
                        break;
                        default:
                        include "INCLUDES/view_all_users.php";
                        
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