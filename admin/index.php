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

                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query = "SELECT * FROM posts";
                                        $select_all_post = mysqli_query($connection, $query);
                                        $post_count = mysqli_num_rows($select_all_post);
                                        ?>



                                        <div class='huge'> <?php echo $post_count ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">


                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>

                                    <?php
                                    $query = "SELECT * FROM comments";
                                    $select_all_comments = mysqli_query($connection, $query);
                                    $comment_count = mysqli_num_rows($select_all_comments);
                                    ?>

                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $comment_count  ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($connection, $query);
                                        $user_count = mysqli_num_rows($select_all_users);
                                        ?>
                                        <div class='huge'><?php echo $user_count  ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="user.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query = "SELECT * FROM categories";
                                        $select_all_categories = mysqli_query($connection, $query);
                                        $categories_count = mysqli_num_rows($select_all_categories);
                                        ?>

                                        <div class='huge'><?php echo $categories_count  ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php

                $query = "SELECT * FROM posts WHERE post_status='published'";
                $select_all_publish_post = mysqli_query($connection, $query);
                $post_publish_count = mysqli_num_rows($select_all_publish_post);

                $query = "SELECT * FROM posts WHERE post_status='draft'";
                $select_all_draft_post = mysqli_query($connection, $query);
                $post_draft_count = mysqli_num_rows($select_all_draft_post);

                 $query = "SELECT * FROM comments WHERE comment_status='Unapproved'";
                 $unapproved_comment_query = mysqli_query($connection, $query);
                 $unapproved_comment_count = mysqli_num_rows($unapproved_comment_query);

                 $query = "SELECT * FROM users WHERE role='Subscriber'";
                 $select_all_Subscriber = mysqli_query($connection, $query);
                 $Subscriber_count = mysqli_num_rows($select_all_Subscriber);

                ?>





                <div class="row">
                    <!-- yeh chart ka javascript cose hai miane direct google chart se uthya hai , iski ek line header file me bhi hai wo line me ek lineary hai jisse humne yaha pe values uthai hai hai   -->

                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                // yeh jo niche miane php likhi hai iska kyamatlab hai to yaha mai kya kar rahu mai apne chart ko dynamic bana raha hu kaise wo dekhao , see chart display karne ka jo format hai wo hai ['post',1000] jaha post coloum ka nam hai or 1000 uski value matkab height decide karega so maine ussi format php me dynamic way se dala hai , phle to maine php me do array banaye ek coloum ka nam dene ke liye ek coloum ko value dene ke liye phir ab muje apni chart me 4 chizo ki value dikhani hai to maine jo ek ke liye command likhuga usko loop me dal dunga , remeber har coloum ka nam or uski value diffrent hogi kyuki maine sare coloum ke nam or uski value ko array me dala hai or phir ek ek karke mai usse display kar raha hu , website me jake chart ko dekh niche diye huye code ko read kar samj jaygea

                                <?php

                                $element_text = ['All-Post','Active-Post', 'Draft-Post', 'Comments','pending_comments', 'Users', 'subscribers','Categories'];
                                $element_count = [$post_count, $post_publish_count ,$post_draft_count, $comment_count,$unapproved_comment_count ,$user_count,  $Subscriber_count,$categories_count];

                                for ($i = 0; $i < 8; $i++) {
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                    // yeh jo uper maine echo under likha hai to jo likha wo to tu smaj gaya jis way me likha hai uske liye tu {  ['Post', 1000],  } yeh{} bracket ke under jo likha hia usse dekh smaj jayega ussi format me maine php me echo kiya hai 
                                }

                                ?>

                               


                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>

                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>

                </div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "INCLUDES/admin_footer.php" ?>