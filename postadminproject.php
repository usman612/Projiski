<?php
ob_start();
session_start();
require'classes/project.php';
$obj = new Project;
$title = 'Add Project';
if(!isset($_SESSION['adminlogin']))
{
  header('location:login.php');
}

if(isset($_POST['submit']))
{
    if(!empty($_FILES['image']['name']))
    {
    
            $add = explode(".", $_FILES['image']['name']); 
            $name = time();
            if (move_uploaded_file($_FILES['image']['tmp_name'], 'projects/project' . $name . "." . $add[1])) {

            } else {
                echo "Failed to upload file Contact Site admin to fix the problem";
            }

            $imgName = 'project' . $name . "." . $add[1]; 
    }
    else{
        $imgName = '';
        }

        $obj->saveAdminProject($_POST,$imgName,$_SESSION['userid']);

    }
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HireIrish</title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Load google fonts-->
    <link href="assets/css.css" rel="stylesheet">
    
    <!-- Vendor css --> 
    <link rel="stylesheet" href="assets/bootstrap-theme.css">
    <link rel="stylesheet" href="assets/font-awesome.css">
    <link rel="stylesheet" href="assets/jquery.css">
    <link rel="stylesheet" href="assets/jslider.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main style -->
    <link rel="stylesheet" href="assets/global.css">
    <link rel="stylesheet" href="assets/responsive.css">
    <style type="text/css">
    .page #columns .warpper {
    padding: 70px 0 300px;
}
    </style>
</head>
<body class="page">
    <div id="all">
        <!-- header -->
        <header id="top-header" class="clearfix">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-sp-12">
                    <div class="logo">
                        <a href="index.html" title="Tiva Freelancer">
                            <img class="img-responsive" src="assets/logo.png" alt="">
                        </a>
                    </div><!--end logo-->
                </div>
                <div class="col-lg-7 col-md-2 col-sm-2 col-xs-1 col-sp-2">
                    <span id="btn-menu"><i class="fa fa-bars"></i></span>
                    <nav id="main-nav">
                        <ul class="nav navbar-nav megamenu">
                            <li>
                                <a href="Seller.html">Seller</a>
                            </li>
                            <li><a href="Jobs.html">Jobs</a></li>
                          
                            <li><a href="support.html">Support</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </nav><!-- end main-nav -->
                </div>
                <div class="col-lg-3 col-md-8 col-sm-7 col-xs-7 col-sp-10">
                    <div class="header_user_info pull-right">
                        <ul class="links">
                            <li class="first">
                                <a class="btn btn-default" href="postjob.html" title="Post a Project">Post a Project</a>
                            </li>
                            <li>
                                <a class="login" href="login.html" title="Login to your customer account"><i class="fa fa-unlock-alt"></i><span>Login</span></a>
                            </li>
                            <li class="last">
                                <a class="register" href="register.html" title="Register"><i class="fa fa-key"></i><span>Register</span></a>
                            </li>
                        </ul>
                    </div><!-- end header_user_info -->
                </div>
            </div>
        </header><!-- end header -->

        <div id="columns" class="columns-container">
            <div class="bg-top"></div>
            <div class="warpper">
                <!-- container -->
                <div class="container">
                    <div class="post-a-project">
                        <h1 class="title_block"><span>Post</span> a project</h1>
                        <div class="box clearfix">
                            <div class="box-content">
                                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-step">
                                            <label>What type of work do you require?</label>
                                            <select id="selectCategories" class="form-control" name="workcategory">
                                                <option value="" selected="selected">Select a category of work</option>
                                                <option value="1">Websites IT &amp; Software</option>
                                                <option value="2">Mobile</option>
                                                <option value="3">Writing</option>
                                                <option value="4">Design</option>
                                                <option value="5">Data Entry</option>
                                                <option value="6">Product Sourcing &amp; Manufacturing</option>
                                                <option value="7">Sales &amp; Marketing</option>
                                                <option value="8">Business, Accounting &amp; Legal</option>
                                                <option value="9">Local Jobs &amp; Services</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>What is your project about?</label>
                                            <input class="form-control" id="textProject" name="projectabout" placeholder="Eg: Design a website" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Description your project</label>
                                            <textarea class="form-control" rows="10" id="description" name="description" placeholder="Type something about your project..."></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-step">
                                            <label>Budget</label>
                                            <input class="form-control" id="textBudget" name="budget" placeholder="Eg: $229.00" type="text">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-step">
                                            <label>Upload Document File(optional)</label>
                                            <input type="file" name="image" class="form-control"    value="fileupload">
                                        </div>
                                       
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-left">
                                           <p>By clicking 'Post Project', you are indicating that you have read and agree to the <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a> and <a href="#" title="Privacy Policy">Privacy Policy</a></p>
                                        </div> 
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
                                           <button type="submit" name="submit" class="btn button btn-primary btn-shadown">Submit your message</button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- end post-a-project -->
                </div><!-- end container -->
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end warp-->

        <!-- footer-->
        <footer id="the-footer">
            <!-- start footer-copyright -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-sp-12">
                        © 2017 HireIrish.
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-sp-12">
                        <div class="social_block">
                            <ul class="links">
                                <li><a href="#"><em class="fa fa-facebook"></em><span class="unvisible">facebook</span> </a></li>
                                <li><a href="#"><em class="fa fa-twitter"></em><span class="unvisible">twitter</span> </a></li>
                                <li><a href="#"><em class="fa fa-dribbble"></em><span class="unvisible">dribbble </span> </a></li>
                                <li><a href="#"><em class="fa fa-youtube-play"></em><span class="unvisible">youtube-play</span> </a></li>
                                <li class="last"><a href="#"><em class="fa fa-google-plus"></em><span class="unvisible">google-plus</span> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end footer-copyright -->
        </footer><!-- end footer -->
        
        <!-- backtop -->
        <div class="go-up" style="display: none;">
            <a href="#"><i class="fa fa-chevron-up"></i></a>    
        </div><!-- end backtop -->
    </div><div id="off-mainmenu"><div class="off-mainnav"><div class="close-menu"><i class="fa fa-close"></i></div><nav id="main-nav">
                        <ul class="nav navbar-nav megamenu">
                            <li>
                                <a href="Seller.html">Seller</a>
                            </li>
                            <li><a href="Jobs.html">Jobs</a></li>
                           
                            <li><a href="support.html">Support</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </nav></div></div> <!-- end all -->

    <!--js fils-->
    <script src="assets/jquery-1.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/custom.js"></script>

    <script src="assets/tmpl.js"></script>
    <script src="assets/jquery.js"></script>
    <script src="assets/draggable-0.js"></script>
    <script src="assets/jquery_002.js"></script>

</body></html>