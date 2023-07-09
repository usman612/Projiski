<?php
session_start();
require'classes/project.php';
$obj = new Project;
$title = 'General Communication';
if(!isset($_SESSION['login']))
{
  header('location:login.php');
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
       if($row['sender']!=1)
        {
        $chat.='<p style="padding:10px;background:lightblue;">'.'<span style="font-weight:bold;border-radius:10px;">'.$row['fname'].'</span>'. ' <br/><span style="padding-left:30px">' . $row['project_detail'].'</span><span style="float:right;">' . $row['date'].'</span></p>';
        }
        else
        {
             $chat.='<p style="padding:10px;background:lightgrey;">'.'<span style="font-weight:bold;border-radius:10px;">'.$row['fname'].'</span>'. ' <br/><span style="padding-left:30px">' . $row['project_detail'].'</span><span style="float:right;">' . $row['date'].'</span></p>';
        }
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
    padding: 40px 0 30px;
}
.btn-info{
  background-color: #197B30 !important;
}
.btn-success{
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
                     <div class="col-md-offset-2 col-md-8" style="background:#fff;">
                    <div class="row">
                       <p id="message" style="text-align:center;color:green;"></p>
                

        <div class="col-md-12">
            <h2 style="padding-left:8px;">Messages</h2>
            <div style="width:100%;height:300px;border:1px solid #eee;overflow-y:scroll;" id="messagebox"></div>
        </div>
        <div class="col-md-12">
                
                    <form method="POST" action="">
                    
                    <div class="form-group">
                    <br>
                        <textarea class="form-control" id="detail" placeholder="Enter Your Text" cols="10" rows="2" name="detail"></textarea>
                    </div>
                    </div>
                    <input type="hidden" id="userid" value="<?php echo $_SESSION['userid'];?>">
                    <input type="hidden" id="admin" value="1">
                    <div class="form-group">
                    <div class="col-md-12">
                    <input class="btn btn-md btn-success" id="submit" type="button" name="submit" value="Send Message" style="float:right;margin-bottom:5px;">
                    </div>
                    </form>
                    <br><br><br>
        </div>
                       
                      
                    </div>
                </div> <!-- end container -->
            </div><!-- end warpper -->
           
        </div><!--end columns-->

        <!-- footer-->
        <?php include('footer.php');?>
        
        <!-- backtop -->
        <div class="go-up" style="display: none;">
            <a href="#"><i class="fa fa-chevron-up"></i></a>    
        </div><!-- end backtop -->
    </div><!-- end all -->

    <!--js fils-->
    <script src="assets/jquery-1.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/custom.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
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
   // $( "#datepicker" ).datepicker();
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