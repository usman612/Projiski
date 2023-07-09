<?php
session_start();
require'classes/project.php';
$obj = new Project;
$title = 'General Communication';
if(!isset($_SESSION['login']))
{
  header('location:login.php');
}



if($_SESSION['usertype']=='client')
{
$projects = $obj->getAllOwnerProjects($_SESSION['userid']);
}
else
{
$projects = $obj->getAllClientProjects($_SESSION['userid']);
}

if(isset($_POST['detail1']))
{   
    $obj->saveClientGeneralCommunication($_POST['detail1'],$_POST['admin1'],$_POST['userid1']);
}
if(isset($_POST['action']))
{
    $result = $obj->getGeneralCommunication($_POST['userid1'],$_POST['admin1']);
    $chat='';
    foreach($result as $row)
    {
        $chat.='<p style="padding-left:10px;">'.'<span style="font-weight:bold;">'.$row['fname'].'</span>'. ' : &nbsp;&nbsp;' . $row['project_detail'].'</p>';
    }

    echo $chat;
    exit();
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
    position: relative;
    z-index: 3;
    padding: 50px 0 300px;
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
           
            <div class="warpper">
                <!-- container -->
                <div class="container">
                    <div class="row">
                       <p id="message" style="text-align:center;color:green;"></p>
                

       
        <div class="col-md-12">
                 
                    <form method="POST" action="">
                    
                    <div class="form-group">
                   
                    </div>
                    </div>
                    <input type="hidden" id="userid" value="<?php echo $_SESSION['userid'];?>">
                    <input type="hidden" id="admin" value="1">
                    <div class="form-group">
                    
                    </div>
                    </form>
                    <br><br><br>
        </div>
                       <div class="col-md-3" style="background: white;min-height: 183px;">
                        <h4 style="padding-top: 5px;text-transform: lowercase;">Communicate with HireIrish support team</h4>
                            <a href="fg_communication.php" class="btn btn-lg btn-info" style="margin-bottom:20px;">Genreal communication</a>
                       </div>
                       <div class="col-md-9">


                        <h2>Assign Projects</h2>
        <?php if(!empty($projects)):?>                
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Budget</th>
                <th>Action</th>
            </tr>
            <?php foreach($projects as $project):?>
            <tr>
                <td><?php echo $project['project_about'];?></td>
                <td>$<?php echo $project['p_budget'];?></td>
                <td><a href="clientchat.php?projectid=<?php echo $project['project_id'];?>&userid=1"><button class="btn btn-sm btn-info" style="background:green;">communicate<span><i class="entypo-sound"></i></span></button></a></td>
               
            </tr>
            <?php endforeach;?>
        </table>
    <?php else:?>
    <br>
    <p>No Project Assigned Yet!.</p>
<?php endif;?>
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
    </div> <!-- end all -->

    <!--js fils-->
    <script src="assets/jquery-1.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/custom.js"></script>

    <script src="assets/tmpl.js"></script>
    <script src="assets/jquery.js"></script>
    <script src="assets/draggable-0.js"></script>
    <script src="assets/jquery_002.js"></script>
    <script type="text/javascript" src="jquery.timers-1.0.0.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function()
    {
        var userid = $('#userid').val();
        var admin = $('#admin').val();
        $("#messagebox").everyTime(1000,function(i){
            $.ajax({
              url: "fg_communication.php",
              type:'POST',
              data:'userid1='+userid+'&admin1='+admin+'&action='+'sendMessage',
              cache: false,
              success: function(html){

                $("#messagebox").html(html);
              }
            })
        })
        
    });
    </script>
    <script type="text/javascript">
    $(function() {
    $( "#datepicker" ).datepicker();
    var userid = $('#userid').val();
var admin = $('#admin').val();
     $.ajax({ 
                    url: 'fg_communication.php',
                    type: 'POST',
                    data:'userid1='+userid+'&admin1='+admin+'&action='+'sendMessage',
                    success: function (result) {
                        $('#messagebox').html(result);
                    }
                });
  });
    </script>
    <script type="text/javascript">
    $('#submit').on('click',function(){

var title = $('#title').val();
var detail = $('#detail').val();
var userid = $('#userid').val();
var admin = $('#admin').val();


if(detail=='')
{
    alert('please fill all the field');
}
else
{
     $.ajax({ 
                    url: 'fg_communication.php',
                    type: 'POST',
                    data:'detail1='+detail+'&userid1='+userid+'&admin1='+admin,
                    async:false,
                    success: function (result) {
                        
                       
                    }
                });

   
    var detail = $('#detail').val('');

    
}

 $.ajax({ 
                    url: 'fg_communication.php',
                    type: 'POST',
                    data:'userid1='+userid+'&admin1='+admin+'&action='+'sendMessage',
                    success: function (result) {
                        $('#messagebox').html(result);
                    }
                });

});
    </script>

</body></html>
<?php 
$_SESSION['error'] = '';
?>