<?php
session_start();
require 'classes/user.php';
$obj = new User;
if(isset($_POST['submit']))
{

 $success = $obj->userLogin($_POST['email'],$_POST['password']);
 if($success==false)
 {
    $_SESSION['error'] = "<p style='color:red;text-align:center;'>Email or Password is incorrect.please try again.</p>";
 }
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
                    <div class="row">
                       <p id="message" style="text-align:center;color:green;"></p>
                

        <div class="col-md-12">
            <h2 style="padding-left:8px;">Messages</h2>
            <div style="width:100%;height:250px;border:1px solid red;overflow-y:scroll;" id="messagebox"></div>
        </div>
        <div class="col-md-12">
                
                    <form method="POST" action="">
                    
                    <div class="form-group">
                    <br>
                        <textarea class="form-control" id="detail" placeholder="Enter Your Text" cols="10" rows="2" name="detail"></textarea>
                    </div>
                    </div>
                    <input type="hidden" id="userid" value="<?php echo $_GET['userid'];?>">
                    <input type="hidden" id="admin" value="<?php echo $_SESSION['userid'];?>">
                    <div class="form-group">
                    <div class="col-md-12">
                    <input class="btn btn-md btn-success" id="submit" type="button" name="submit" value="Send Message" style="float:right;">
                    </div>
                    </form>
                    <br><br><br>
        </div>
                       
                      
                    </div>
                </div> <!-- end container -->
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end columns-->

        <!-- footer-->
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
<?php 
$_SESSION['error'] = '';
?>