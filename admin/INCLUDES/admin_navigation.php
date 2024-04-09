<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li><a href="../index.php">HOME PAGE</a></li>

               
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?php
                    
                    if(isset($_SESSION['username'])){

                        echo $_SESSION['username'];
                    }
                    
                    ?> 
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/CMS/admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        
                        <li class="divider"></li>
                        <li>
                            <a href="..//includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php">View All Post</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Post</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                 
                    <li class="">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                            <a href="./user.php">View All Users</a>
                            <!-- here hum direct view_all_user.php page link kar sakte the but wo security wise safe nahi hota because waha hum directly kisi ko bhi apne sare users dikha dete without any security but agar hum user.php ke through bejege to waha user.php page check kar lega ki jo insan view_all_user.php page pe jane chaata hai wo login in hai ya nahi , ya usse waha jane ka access hai ya nahi  -->

                            </li>
                            <li>
                                <a href="user.php?source=add_user">Add Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-file"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
