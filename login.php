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
                          <?php if(isset($_SESSION['error'])):?>
                        <?php echo $_SESSION['error'];?>
                    <?php else:?>
                    <?php endif;?>
                        <div class="col-lg-6">
                            <form action="#" id="create-account-form" class="form-horizontal box panel panel-default" style="min-height:350px;">
                                <h3 class="panel-heading">Create an account</h3>
                                <div class="form_content panel-body clearfix">
                                     <!-- <center><a href="facebooktest/fbconfig.php"><button type="button" class="btn btn-md btn-default" style="width:auto;height:auto;background:#4267b2;margin-left:auto;margin-right:auto;border:1px solid #4267b2;color:#fff;"><h3 style="color:#fff;padding-top:2px;"><span style="padding-right:5px;"><i class="fa fa-facebook-square"></i></span> <span>Sign UP With Facebook</span></h3></button></a></center> -->
                                     <br>
                                    <p>Registration is quick and easy. It allows you to be able to get Jobs.</p>
                                    <a href="register.php" class="btn button btn-default" title="Create an account" rel="nofollow"><i class="fa fa-user left"></i> Create an account</a>
                                </div>
                            </form><!--end form -->
                        </div>
                        <div class="col-lg-6">
                            <form action="" id="form-login" class="form-horizontal box panel panel-default" method="POST">
                                <h3 class="panel-heading">Already registered?</h3>
                                <div class="form_content panel-body clearfix">
                                    <div class="form-group">
                                         <!-- <center><a href="facebooklogin/fbconfig.php?loginfb=1"><button type="button" class="btn btn-md btn-default" style="width:auto;height:auto;background:#4267b2;margin-left:auto;margin-right:auto;border:1px solid #4267b2;color:#fff;"><h3 style="color:#fff;padding-top:2px;"><span style="padding-right:5px;"><i class="fa fa-facebook-square"></i></span> <span>Login With Facebook</span></h3></button></a></center> -->
                                        <div class="col-lg-12">
                                            <label for="email">Email address</label>
                                            <input class="form-control" id="email" name="email" type="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="passwd">Password</label>
                                            <input class="form-control" id="passwd" name="password" type="password" placeholder="********" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <p class="lost_password">
                                                <a href="#" title="Recover your forgotten password" rel="nofollow">Forgot your password?</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button type="submit" name="submit" class="btn button btn-default"><i class="fa fa-lock left"></i> Sing in</button>
                                        </div>
                                    </div>
                                </div>
                            </form><!--end form -->
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
    </div>
    <?php include('header2.php');?>
     <!-- end all -->

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