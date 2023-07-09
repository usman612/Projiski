<?php
session_start();
require 'classes/user.php';
$obj = new User;
if(isset($_POST['search']))
{
    if(!empty($_POST['category']))
    {
        $search = $_POST['category'];
    }
    else
    {
        $search = '';
    }

    if(!empty($_POST['searchskills']))
    {
        $skill = $_POST['searchskills'];
    }
    else
    {
        $skill = '';
    }

    
    $users = $obj->searchFreelancers($search,$skill);
   
    }
    else
    {
    $users = $obj->getAllFreelancers();
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
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="assets/css.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap-theme.css">
    <link rel="stylesheet" href="assets/font-awesome.css">
    <link rel="stylesheet" href="assets/jquery.css">
    <link rel="stylesheet" href="assets/jslider.css">
    <link rel="stylesheet" href="assets/global.css">
    <link rel="stylesheet" href="assets/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    #columns .warpper {
    position: relative;
    z-index: 3;
    padding: 30px 0 30px;
}
    </style>
</head>
<body id="index" class="index">
    <div id="all">
        <!-- header -->
       <?php include('header.php');?>

        <div id="columns" class="columns-container">
            <div class="bg-top"></div>
            <div class="warpper">
                <!-- container -->
                <div class="container">
                    <div id="block-search" class="block-search">
                        <h1>We Have <span>2900+</span> Professionals for you</h1>
                        
                        <form  method="POST" id="searchbox" action="" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 col-sp-12">
                                    <input class="form-control" id="inputKeywords" placeholder="Keywords..." type="text" name="searchskills">
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 col-sp-12">
                                    <select id="selectCategories" class="form-control" name="category">
                                        <option selected="selected" value="">Categories</option>
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
                              
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-sp-12 fr-search">
                                    <button type="submit" name="search" class="btn btn-primary">Search now</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end #search_block_top -->
                </div> <!-- end container -->

                 <div class="container">
                    <div class="job-freelancer">
                        <div class="row">

                          <?php foreach($users as $user):?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="job-freelanceritem">
                                        <a class="projectjob-title" href="#" title="">
                                                <img class="img-responsive" src="images/<?php echo $user['image'];?>" alt="" width="80">
                                            </a>
                                            <div class="project-content">
                                                <div class="author">
                                                    <a href="viewprofile.php?userid=<?php echo $user['id'];?>" title=""><?php echo $user['fname'];?> <?php echo $user['lname'];?></a>-<span><?php echo $user['position'];?></span></div>
                                                <div class="vote-ratting clearfix">
                                                    <span class="star_content">
                                                        <span class="star star_on"></span>
                                                        <span class="star star_on"></span>
                                                        <span class="star star_on"></span>
                                                        <span class="star star_on"></span>
                                                        <span class="star star"></span>
                                                    </span>
                                                </div>
                                                <div class="desc">
                                                    
                                                    <p>
                                                        <?php
                        $string = strip_tags($user['introduction']);

if (strlen($string) > 200) {

    // truncate string
    $stringCut = substr($string, 0, 200);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
}
echo $string;
                        ?>
                                                    </p>
                                                </div>
                                        <ul class="list-inline clearfix">
                                            <?php $skills = explode(',', $user['skills']);?>
                                            <?php foreach($skills as $data):?>
                                            <li><a href="#" title="Graphic"><?php echo $data;?></a></li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                           
                        </div>
                       <!--  <div class="job-loadprofile text-center">
                            <a class="btn btn-default" href="#" title="load more profiles">load more profiles</a>
                        </div> -->
                   
            <div class="bg-bottom"></div>
        </div>
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end columns-->

                <!-- container -->
               
        <!-- footer-->
        <!-- end footer -->
        <?php include('footer.php');?>
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