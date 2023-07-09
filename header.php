<?php 
error_reporting(E_ALL); ini_set('display_errors', '1');
?>
 <header id="top-header" class="clearfix">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-sp-12">
                    <div class="logo">
                        <a href="index.php" title="Tiva Freelancer">
                            <img class="img-responsive" src="assets/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-2 col-sm-2 col-xs-1 col-sp-2">
                    <span id="btn-menu"><i class="fa fa-bars"></i></span>
                    <nav id="main-nav">
                        <ul class="nav navbar-nav megamenu">
                            <!-- <li><a href="index.php">Home</a></li>
                     <li><a href="viewfreelancers.php">Seller</a></li>  -->
                           
                            
                            <?php if(isset($_SESSION['login'])):?>
                             
                             <?php if($_SESSION['usertype']=='user'):?>
                             
                            <li><a href="profile.php">Profile</a></li>
                            <?php else:?>
                            <li><a href="client_profile.php">Profile</a></li>

                             <?php endif;?>
                           <!--  <li class="first"><a href="clients_project.php" class="btn btn-default">Projects</a></li> -->
                            <?php else:?>
                            <?php endif;?>
                        </ul>
                    </nav><!-- end main-nav -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-7 col-xs-7 col-sp-10">
                    <div class="header_user_info pull-right">
                        <ul class="links">
                            
                            <?php if(!isset($_SESSION['login'])):?>
                            <li>
                                <a class="login" href="login.php" title="Login to your customer account"><i class="fa fa-unlock-alt"></i><span>Login</span></a>
                            </li>
                            <li class="last">
                                <a class="register" href="register.php" title="Register"><i class="fa fa-key"></i><span>Register</span></a>
                            </li>
                        <?php else:?>
                         <li class="first"><a href="clients_project.php" class="btn btn-info">Projects</a></li>
                        <?php if($_SESSION['usertype']=='client'):?>
                        <li class="first">
                                <a class="btn btn-default" href="postjob.php" title="Post a Project">Post a Project</a>
                            </li>
                         
                        <?php else:?>
                        <?php endif;?>    
                         <li class="last">
                                <?php if($_SESSION['usertype']=='user'):?>
                                <a class="register" href="userprofile.php" title="Register"><i class="fa fa-user"></i><span><?php echo $_SESSION['login'];?></span></a>
                                <?php else:?>
                                 <a class="register" href="viewclientprofile.php" title="Register"><i class="fa fa-user"></i><span><?php echo $_SESSION['login'];?></span></a>
                            <?php endif;?>
                            
                            </li>
                          <li class="last">
                                <a class="register" href="logout.php" title="Register"><i class="fa fa-sign-out"></i><span>LogOut</span></a>
                            </li>  
                        <?php endif;?>
                        </ul>
                    </div><!-- end header_user_info -->
                </div>
            </div>
        </header>