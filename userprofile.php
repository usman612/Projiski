<?php
session_start();
require 'classes/user.php';
$obj = new User;
if(isset($_GET['userid']))
{
$personal = $obj->getUserPersonalData($_GET['userid']);
$qualification = $obj->getUserQualification($_GET['userid']);
$experience = $obj->getUserExperience($_GET['userid']);
}
else
{
$personal = $obj->getUserPersonalData($_SESSION['userid']);
$qualification = $obj->getUserQualification($_SESSION['userid']);
$experience = $obj->getUserExperience($_SESSION['userid']);
}
?>
<!DOCTYPE html>
<html lang="en"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Basic Page Needs -->
    
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
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <style type="text/css">
    .btn-success{
        background-color: #197B30 !important;
    }
    .btn-info{
        background-color: #197B30 !important;
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
                    <div class="freelance-detail">
                        <div class="freelance-detail-tab box">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#about-me" aria-controls="about-me" role="tab" data-toggle="tab">About me</a></li>
                               
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="about-me">
                                    <div class="tabbox-content">
                                        <div class="media clearfix">
                                            <div class="pull-left">
                                                <span class="avatar-profile">
                                                  <?php if(!empty($personal['image'])):?>
                                                    <img class="img-responsive" src="images/<?php echo $personal['image'];?>" alt="" style="width:100px;height:100px;">
                                                    <?php else:?>
                                                    <img class="img-responsive" src="images/usericon.png" alt="" style="width:100px;height:100px;">
                                                <?php endif;?>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h2><?php echo $personal['fname'];?> <?php echo $personal['lname'];?></h2>
                                                <h4 class="position-profile"><?php echo $personal['position'];?></h4>

                                            </div>
                                        </div>
                                        <div class="des">
                                            <p class="pdropcap"><?php echo $personal['introduction'];?></p>
                                        </div>
                                        <hr>
                                        <p class="position-profile"><span style="font-size: 18px;font-family:Oswald,sans-serif;font-weight: 700;line-height: 1.1;color: black;text-transform: uppercase;">Skills : </span><span style="font-size:14px;font-weight:0;"><?php echo $personal['skills'];?></span></p>
                                        <hr>
                                         <h4 class="position-profile">Qualifications :</h4>
                                        <table class="table table-striped">
                                        <thead>
                                                <tr>
                                                <th>Qualification Title</th>
                                                <th>Year Started</th>
                                                <th>Year End</th>
                                                <th>Grade</th>
                                            </tr>
                                        </thead>
                                        <?php foreach($qualification as $qdata):?>
                                        <tr>
                                                <th><?php echo $qdata['q_title'];?></th>
                                                <th><?php echo $qdata['q_started'];?></th>
                                                <th><?php echo $qdata['q_end'];?></th>
                                                <th><?php echo $qdata['q_grade'];?></th>
                                            </tr>
                                        <?php endforeach;?>
                                        </table>

                                        <hr>
                                         <h4 class="position-profile">Experiences :</h4>
                                        <table class="table table-striped">
                                        <thead>
                                                <tr>
                                                <th>Company Name</th>
                                                <th>Post Title</th>
                                                <th>Started Date</th>
                                                <th>Ending Date</th>
                                                <th>Responsibility</th>
                                            </tr>
                                        </thead>
                                        <?php foreach($experience as $qdata):?>
                                        <tr>
                                                <th><?php echo $qdata['company_name'];?></th>
                                                <th><?php echo $qdata['post_title'];?></th>
                                                <th><?php echo $qdata['e_started'];?></th>
                                                <th><?php echo $qdata['e_end'];?></th>
                                                <th><?php echo $qdata['responsibility'];?></th>
                                            </tr>
                                        <?php endforeach;?>
                                        </table>
                                    
                                       
                                    </div>
                                </div>
                  
                
                            </div>
                        </div><!-- end freelance-detail-tab -->
              
                    </div><!-- end freelance-detail -->    
                </div> <!-- end container -->
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end columns-->

        <!-- footer-->
        <?php include('footer.php');?>

         <!-- backtop -->
      
   
    <!--js fils-->
   <script src="assets/jquery-1.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/custom.js"></script>

    <script src="assets/tmpl.js"></script>
    <script src="assets/jquery.js"></script>
    <script src="assets/draggable-0.js"></script>
    <script src="assets/jquery_002.js"></script>

</body></html>