<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();
require 'classes/user.php';
$obj = new User;


if(isset($_GET['fname']))
{
   $fname = $_GET['fname'];
}
else
{
    $fname  = '';
}
if(isset($_GET['lname']))
{
   $lname = $_GET['lname'];
}
else
{
    $lname  = '';
}
if(isset($_GET['email']))
{
   $email = $_GET['email'];
}
else
{
    $email  = '';
}
if(isset($_POST['submit']))
{
 $save = $obj->saveUser($_POST);
 if($save==true)
 {
    $_SESSION['success'] = "<p style='color:green;text-align:center;'>User Registered Successfully.<span><a href='login.php'></a></span></p>";
    header("Location:register.php");
 }
 else
 {
    $_SESSION['fail'] = "<p style='color:red;text-align:center;'>User Already Registered.<span><a href='login.php'></a></span></p>";
    header("Location:register.php");
}
}
else
{
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
    padding: 50px 0 300px;
}
</style>
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
                        <?php if(isset($_SESSION['success'])):?>
                        <?php echo $_SESSION['success'];?>
                    <?php else:?>
                    <?php endif;?>
                     <?php if(isset($_SESSION['fail'])):?>
                        <?php echo $_SESSION['fail'];?>
                    <?php else:?>
                    <?php endif;?>
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                            <form action=""  class="form-horizontal box panel panel-default" method="POST">
                                <h3 class="panel-heading">Create an account</h3>
                                <div class="form_content panel-body clearfix">
                                    <!-- <div class="form-group">
                                    <center><a href="facebooktest/fbconfig.php"><button type="button" class="btn btn-md btn-default" style="width:auto;height:auto;background:#4267b2;margin-left:auto;margin-right:auto;border:1px solid #4267b2;color:#fff;"><h3 style="color:#fff;padding-top:2px;"><span style="padding-right:5px;"><i class="fa fa-facebook-square"></i></span> <span>Sign UP With Facebook</span></h3></button></a></center>
                                    </div> -->
                                    <div class="form-group required">
                                        <div class="col-md-offset-4 col-lg-6">     
                                            <p>
                                                <input  id="freelancer" name="usertype" type="radio" value="user" checked >
                                            <label for="firstname">Freelancer</label>
                                           
                                            <span> <input  id="client" name="usertype" value="client" type="radio">
                                            <label for="firstname">Client</label> </span>
                                            </p>
                                        </div>
                                     
                                         
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-lg-12">
                                            <label for="firstname">First name <sup>*</sup></label>
                                            <input class="form-control" id="firstname" name="firstname" type="text" value="<?php echo $fname; ?>" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-lg-12">
                                            <label for="lastname">Last Name <sup>*</sup></label>
                                            <input class="form-control" id="lastname" name="lastname" type="text" value="<?php echo $lname; ?>" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-lg-12">
                                            <label for="email">Email address <sup>*</sup></label>
                                            <input class="form-control" id="email" name="email" type="email" placeholder="Email" value="<?php echo $email;?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-lg-12">
                                            <label for="passwd">Password <sup>*</sup></label>
                                            <input class="form-control" id="passwd" name="password" type="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                    <div class="col-lg-12" id="county">
                                            <label for="email">County</label>
                                            <select class="form-control" name="county">
                                                <option value="">Select County</option>
                                                <option value="Antrim">Antrim</option>
                                                <option value="Armagh">Armagh</option>
                                                <option value="Carlow">Carlow</option>
                                                <option value="Cavan">Cavan</option>
                                                <option value="Clare">Clare</option>
                                                <option value="Cork">Cork</option>
                                                <option value="Derry">Derry</option>
                                                <option value="Donegal">Donegal</option>
                                                <option value="Down">Down</option>
                                                <option value="Dublin">Dublin</option>
                                                <option value="Fermanagh">Fermanagh</option>
                                                <option value="Galway">Galway</option>
                                                <option value="Kerry">Kerry</option>
                                                <option value="Kildare">Kildare</option>
                                                <option value="Kilkenny">Kilkenny</option>
                                                <option value="Laois">Laois</option>
                                                <option value="Leitrim">Leitrim</option>
                                                <option value="Limerick">Limerick</option>
                                                <option value="Longford">Longford</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button type="submit" name="submit" class="btn button btn-default">Register</button>
                                           
                                            <p class="pull-right required"><span><sup>*</sup>Required field</span></p>
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
    <script type="text/javascript">

    $('#client').on('click',function(){
         if($('#client').is(':checked'))
         {
            $('#county').hide();
         }
         if($('#freelancer').is(':checked'))
         {
             $('#county').show();
         }

        
    });
     $('#freelancer').on('click',function(){
        if($('#client').is(':checked'))
         {
            $('#county').hide();
         }
         if($('#freelancer').is(':checked'))
         {
             $('#county').show();
         }
    });
    </script>
</body></html>
<?php 
$_SESSION['success']='';
$_SESSION['fail']='';
}
?>