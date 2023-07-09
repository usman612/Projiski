<?php
session_start();
require 'classes/user.php';
$obj = new User;
$users = $obj->getAllFreelancers();
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

</head>
<body class="page">
    <div id="all">
        <!-- header -->
        <?php include('header.php');?>
        <div id="columns" class="columns-container">
            <div class="bg-top"></div>
            <div class="warpper">
                <!-- container -->
                <div class="container">
                    <div class="job-freelancer">
                        <div class="row">

                          <?php foreach($users as $user):?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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

if (strlen($string) > 500) {

    // truncate string
    $stringCut = substr($string, 0, 500);

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
                        <!-- <div class="job-loadprofile text-center">
                            <a class="btn btn-default" href="#" title="load more profiles">load more profiles</a>
                        </div> -->
                    </div><!-- end job-freelancer -->
                </div> <!-- end container -->
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end columns-->

        <div class="job-searchform">
            <a href="#" class="btn-close" title="close"><i class="fa fa-close"></i></a>
            <div class="container">
                <div class="job-search">
                    <form id="form-jobsearch" action="#" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-sp-12">
                                <input class="form-control" id="inputKeywords" placeholder="Keywords..." type="text">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-sp-12">
                                <select id="selectCategories" class="form-control">
                                    <option selected="selected">Categories</option>
                                    <option>Websites IT &amp; Software</option>
                                    <option>Mobile</option>
                                    <option>Writing</option>
                                    <option>Design</option>
                                    <option>Data Entry</option>
                                    <option>Product Sourcing &amp; Manufacturing</option>
                                    <option>Sales &amp; Marketing</option>
                                    <option>Business, Accounting &amp; Legal</option>
                                    <option>Local Jobs &amp; Services</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-sp-12">
                                <select id="selectLocation" class="form-control">
                                    <option selected="selected">Location</option>
                                    <option>Submit some Articles</option>
                                    <option>Analyze some Data</option>
                                    <option>Fill in a Spreadsheet with Data</option>
                                    <option>Post some Advertisements</option>
                                    <option>Hire a Virtual Assistant </option>
                                    <option>Search the Web for Something</option>
                                    <option>Find Information from Websites</option>
                                    <option>Do some Excel Work</option>
                                    <option>Help with customer support</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-sp-12">
                                <select id="selectProject" class="form-control">
                                    <option selected="selected">Project type</option>
                                    <option>Submit some Articles</option>
                                    <option>Analyze some Data</option>
                                    <option>Fill in a Spreadsheet with Data</option>
                                    <option>Post some Advertisements</option>
                                    <option>Hire a Virtual Assistant </option>
                                    <option>Search the Web for Something</option>
                                    <option>Find Information from Websites</option>
                                    <option>Do some Excel Work</option>
                                    <option>Help with customer support</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-sp-12">
                                <input class="form-control" id="inputSkill" placeholder="Skill..." type="text">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-sp-12">
                                <div id="slider-range" class="tiva-filter">
                                    <label>Budget</label>
                                    <div class="filter-item price-filter">
                                        <div class="layout-slider">
                                            <input id="price-filter" name="price" value="0;100" style="display: none;"><span class="jslider jslider_plastic"><table><tbody><tr><td><div class="jslider-bg"><i class="l"></i><i class="f"></i><i class="r"></i><i class="v" style="left: 0%; width: 100%;"></i></div><div class="jslider-pointer" style="left: 0%;"></div><div class="jslider-pointer jslider-pointer-to" style="left: 100%;"></div><div class="jslider-label"><span>0</span></div><div class="jslider-label jslider-label-to" style="display: block;"><span>100</span>&nbsp;$</div><div class="jslider-value" style="left: 0%; margin-left: 0px; right: auto; visibility: visible;"><span>0</span>&nbsp;$</div><div class="jslider-value jslider-value-to" style="visibility: visible; left: 100%; margin-left: 0px; right: auto;"><span>100</span>&nbsp;$</div><div class="jslider-scale"></div></td></tr></tbody></table></span>
                                        </div>
                                        <div class="layout-slider-settings"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 col-sp-12 fr-search">
                                <button type="submit" class="btn btn-primary btn-shadown">Search now</button>
                            </div>
                        </div>
                    </form>
                </div><!-- end job-search -->
            </div><!-- end container -->
        </div><!-- end job-searchform -->
       

        <!-- footer-->
        <?php include('footer.php');?>
        
        <!-- backtop -->
        <div class="go-up" style="display: none;">
            <a href=""><i class="fa fa-chevron-up"></i></a>    
        </div><!-- end backtop -->
    </div><div id="off-mainmenu"><div class="off-mainnav"><div class="close-menu"><i class="fa fa-close"></i></div><nav id="main-nav">
                        <ul class="nav navbar-nav megamenu">
                            <li class="active">
                                <a href="seller.html">Seller</a>
                            </li>
                            <li><a href="postjob.php">Jobs</a></li>
                         
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