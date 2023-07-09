<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();
require 'classes/sendmail.php';
if(isset($_POST['submit']))
{           
            $email='';
            $name='';
            $phone='';
            $message='';
            $email = $_POST['email'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $text = $_POST['message'];

            $admin_email = 'khurramgujjar40@gmail.com';
            $from = $_POST['email'];
            $subject = "HireIrish User Contact";
            $message = "Name : $name <br/>";
            $message .= "Email : $email <br/>";
            $message .= "Phone : $phone <br/>";
            $message.= $text;
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "From: '$from'" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $email_send = mail($admin_email, $subject, $message, $headers);

             if($email_send)
                {  
                $_SESSION['success'] =  "<p style='color:green;text-align:center;'>Message has sent</p>";
                }
    
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><link type="text/css" rel="stylesheet" href="assets/css_002.css"><style type="text/css">.gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}
</style><style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}</style><style type="text/css">.gm-style-pbc{transition:opacity ease-in-out;background-color:rgba(0,0,0,0.45);text-align:center}.gm-style-pbt{font-size:22px;color:white;font-family:Roboto,Arial,sans-serif;position:relative;margin:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}
</style>
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
    .btn-success{
        background-color: #197B30 !important;
    }
    .btn-info{
        background-color: #197B30 !important;
    }
    .btn-default{
        background-color: #197B30 !important;
    }
    </style>
<script type="text/javascript" charset="UTF-8" src="assets/common.js"></script><script type="text/javascript" charset="UTF-8" src="assets/util.js"></script><script type="text/javascript" charset="UTF-8" src="assets/geocoder.js"></script><script type="text/javascript" charset="UTF-8" src="assets/AuthenticationService.Authenticate"></script><script type="text/javascript" charset="UTF-8" src="assets/GeocodeService.Search"></script><script type="text/javascript" charset="UTF-8" src="assets/map.js"></script><script type="text/javascript" charset="UTF-8" src="assets/marker.js"></script><style type="text/css">.gm-style {
        font: 400 11px Roboto, Arial, sans-serif;
        text-decoration: none;
      }
      .gm-style img { max-width: none; }</style><script type="text/javascript" charset="UTF-8" src="assets/onion.js"></script><script type="text/javascript" charset="UTF-8" src="assets/ViewportInfoService.GetViewportInfo"></script><script type="text/javascript" charset="UTF-8" src="assets/controls.js"></script><script type="text/javascript" charset="UTF-8" src="assets/vt"></script><script type="text/javascript" charset="UTF-8" src="assets/stats.js"></script><script type="text/javascript" charset="UTF-8" src="assets/QuotaService.RecordEvent"></script></head>
<body class="page">
    <div id="all">
        <!-- header -->
        <?php include('header.php');?>

        <div id="columns" class="columns-container">
            <div class="bg-top"></div>
            <div class="warpper">
                <!-- container -->
                <div class="container">
                    <div class="contact-us">
                        <h1 class="title_block"><span>Contact</span> us</h1>
                         <p><?php if(isset($_SESSION['success'])){echo $_SESSION['success'];}?></p>
                        <div class="contact-form clearfix">
                            <form action="" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <input id="name" name="name" placeholder="Name*" type="text" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <input id="email" name="email" placeholder="Email*" type="email" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <input id="phone" name="phone" placeholder="Phone*" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea id="message" name="message" placeholder="enter your message*" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12 text-right">
                                        <span class="reset">Reset All Field</span>
                                       <button type="submit" name="submit" class="btn button btn-default btn-shadown">Submit your message</button>
                                    </div> 
                                </div>
                            </form>
                        </div><!-- end contac-form -->
                    </div><!-- end contact-us -->
                </div> <!-- end container -->
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end warp-->

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
                            <li><a href="Jobs.html">Jobs</a></li>
                            <li><a href="support.html">Support</a></li>
                            <li class="active"><a href="contact.html">Contact</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </nav></div></div> <!-- end all -->

    <!--js fils-->
    <script src="assets/jquery-1.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/js"></script>
    <script src="assets/custom.js"></script>

    <script src="assets/tmpl.js"></script>
    <script src="assets/jquery.js"></script>
    <script src="assets/draggable-0.js"></script>
    <script src="assets/jquery_002.js"></script>

</body></html>
<?php 
$_SESSION['success']='';
?>