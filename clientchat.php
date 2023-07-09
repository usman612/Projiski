<?php
session_start();
require'classes/project.php';
$obj = new Project;
$title = 'General Communication';
if(!isset($_SESSION['login']))
{
  header('location:login.php');
}


if(isset($_POST['sendinvoice']))
{
    $obj->saveInvoice($_POST,$_SESSION['userid'],$_GET['projectid']);
}
if(isset($_GET['projectid']))
{
$invoices = $obj->getProjectInvoices($_SESSION['userid'],$_GET['projectid']);
}

if(isset($_GET['invoiceid']))
{
    $singleinvoice = $obj->getSingleInvoice($_GET['invoiceid']);   
}

$invoices = $obj->getAllInvoices($_SESSION['userid']); 


if(isset($_POST['getChatid']))
{
 echo $chatid = $obj->getChatId($_POST['projectid1'],$_POST['userid1'],$_POST['admin1']);
 exit();
}

if(isset($_POST['detail1']))
{   
    $obj->saveProjectClientCommunication($_POST['detail1'],$_POST['admin1'],$_POST['userid1'],$_POST['projectid1']);
}
if(isset($_POST['action']))
{   if(empty($_POST['chatid1']))
    {
        $_POST['chatid1']='';
    }
    $result = $obj->getProjectCommunication($_POST['chatid1']);
    $chat='';
    foreach($result as $row)
    {   
        if($row['sender']!=1)
        {
        $chat.='<p style="padding:10px;background:lightblue;">'.'<span style="font-weight:bold;border-radius:10px;">'.$row['fname'].'</span>'.  ' <br/><span style="padding-left:4px;">' . $row['message'].'</span><span style="float:right;">' . $row['date'].'</span></p>';
        }
        else
        {
             $chat.='<p style="padding-left:10px;background:lightgrey;">'.'<span style="font-weight:bold;border-radius:10px;">'.$row['fname'].'</span>'.  ' <br/><span style="padding-left:4px;">' . $row['message'].'</span><span style="float:right;">' . $row['date'].'</span></p>';
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
        rel="stylesheet" type="text/css" />
     <style type="text/css">
    .page #columns .warpper {
    position: relative;
    z-index: 3;
    padding: 50px 0 300px;
}
.ui-widget-header {
background: grey !important;
border: 1px solid grey;
    }
    .btn-info{
    background-color: #197B30 !important;
}
.btn-success{
    background-color: #197B30 !important;
}
    </style>
     <script type="text/javascript">
        $(function () {
            $("#dialog").dialog({
                modal: true,
                autoOpen: false,
                title: "Invoice Detail",
                width: 500,
                height:360
            });
            $("#btnShow").click(function () {
                $('#dialog').dialog('open');
            });
        });
    </script>
</head>
<body class="page">
    <div id="all">

        <!-- header -->
        <?php include('header.php');?>
 
        <div id="columns" class="columns-container">
           
            <div class="warpper">
                <!-- container -->
        <div class="col-md-12">
        <?php if($_SESSION['usertype']!='client'):?>    
        <button type="button" class="btn btn-md btn-info" style="float:right;" id="btnShow">Send Invoice</button>
        <?php else:?>
    <?php endif;?>
        <div id="dialog" style="display: none" align="center">
        <form method="POST" action="">
            <div class="col-md-12">
            <label class="label-control">Project Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-12">
            <label class="label-control">Project Amount</label>
            <input type="text" name="budget" class="form-control" placeholder="Amount">
            </div>
            <div class="col-md-12">
            <label class="label-control">Project Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="col-md-12">
                <br>
                <button class="btn btn-sm btn-info" id="submitid" name="sendinvoice" type="submit" >Send<span><i class="entypo-check"></i></span></button>
            </div>

           </form>
    </div>
                        <br>
                    </div>

               
                <div class="container" style="margin-top:10px;">

                    <div class=" col-md-8" style="background:#fff;">
                    <div class="row">
                       <p id="message" style="text-align:center;color:green;"></p>
                

        <div class="col-md-12">

            <h2 style="padding-left:8px;">Work Stream</h2>
            <div style="width:100%;height:300px;border:1px solid #eee;overflow-y:scroll;" id="messagebox"></div>
        </div>
       
                    <div class="col-md-12">
                    <form method="POST" action="">
                    
                    <div class="form-group">
                    <br>
                        <textarea class="form-control" id="detail" placeholder="Enter Your Text" cols="10" rows="2" name="detail"></textarea>
                    </div>
                 
                    <input type="hidden" id="userid" value="<?php echo $_SESSION['userid'];?>">
                    <input type="hidden" id="projectid" value="<?php echo $_GET['projectid'];?>">
                    <input type="hidden" id="admin" value="1">
                    <div class="form-group">
                  
                    <input class="btn btn-md btn-success" id="submit" type="button" name="submit" value="Send Message" style="float:right;margin-bottom:5px;background-color:green;">
                    </div>
                    
                    </form>
                    </div>
                    <br><br><br>
                    </div>
                       
                    
                    </div>
                    <?php if($_SESSION['usertype']!='client'):?>
                    <div class="col-md-3" style="height:495px;background:#fff;color:#000;border:1px solid grey;">
                       
                       <?php if(empty($invoices)):?>
                       <h3 style="text-align:center;">No Invoice Exist!</h3>
                   <?php else:?>
                        <h3 style="text-align:center;padding-top:2px;">Invoice Detail</h3>
                        <br>
                        <?php if(empty($singleinvoice)):?>

                         <div class="col-md-6"><b>Invoice Id :</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['invoice_id'];?> </div>
                     <div class="col-md-6"><b>Project Title:</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['project_title'];?> </div>
                    <div class="col-md-6"><b>Amount :</b> </div>
                    <div class="col-md-6">$<?php echo $invoices[0]['amount'];?> </div>
                    <div class="col-md-6"><b>Bank Name :</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['bank_name'];?> </div>
                     <div class="col-md-6"><b>Acc Title :</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['account_title'];?> </div>
                    <div class="col-md-6"><b>Acc No :</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['accountno'];?> </div>
                    <div class="col-md-6"><b>Branch Code :</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['branchcode'];?> </div>
                    <div class="col-md-6"><b>Bic :</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['bic'];?> </div>
                    <div class="col-md-6"><b>IBAN :</b> </div>
                    <div class="col-md-6"><?php echo $invoices[0]['iban'];?> </div>
                    <?php else:?>
                    <div class="col-md-6"><b>Invoice Id :</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['invoice_id'];?> </div>
                     <div class="col-md-6"><b>Project Title:</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['project_title'];?> </div>
                    <div class="col-md-6"><b>Amount :</b> </div>
                    <div class="col-md-6">$<?php echo $singleinvoice['amount'];?> </div>
                    <div class="col-md-6"><b>Bank Name :</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['bank_name'];?> </div>
                     <div class="col-md-6"><b>Acc Title :</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['account_title'];?> </div>
                    <div class="col-md-6"><b>Acc No :</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['accountno'];?> </div>
                    <div class="col-md-6"><b>Branch Code :</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['branchcode'];?> </div>
                    <div class="col-md-6"><b>Bic :</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['bic'];?> </div>
                    <div class="col-md-6"><b>IBAN :</b> </div>
                    <div class="col-md-6"><?php echo $singleinvoice['iban'];?> </div>
                <?php endif;?>
                    </div>
                     <?php endif;?>
                <?php else:?>
            <?php endif;?>


                </div> <!-- end container -->
                <br><br>
                <?php if($_SESSION['usertype']!='client'):?>
 <div class="container">
                 <div class="col-md-10">


                        <h2>Project Invoices</h2>
        <table class="table table-striped">
            <tr>
                <th>Invoice No</th>
                <th>Amount</th>
                <th>date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach($invoices as $project):?>
            <tr>
                <td><?php echo $project['invoice_id'];?></td>
                <td><?php echo $project['amount'];?></td>
                <td><?php echo $project['date'];?></td>
                <td>
                    <?php 
                    if($project['status']==0)
                    {
                        echo 'pending';
                    }
                if($project['status']==1)
                    {
                        echo 'Approved';
                    }
                if($project['status']==2)
                {
                    echo 'cancel';
                }
                ?> </td>
              <td><a href="clientchat.php?projectid=<?php echo $_GET['projectid'];?>&userid=<?php echo $_GET['userid'];?>&invoiceid=<?php echo $project['invoice_id'];?>"><button class="btn btn-sm btn-info">View Detail<span><i class="entypo-sound"></i></span></button></a></td>
               
            </tr>
            <?php endforeach;?>
        </table>
    </div>


            </div>
        <?php else:?>
    <?php endif;?>


            </div>

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
        var projectid = $('#projectid').val();
        var chatid;
        
        $("#messagebox").everyTime(1000,function(i){
            $.ajax({ 
                    url: 'clientchat.php',
                    type: 'POST',
                    data:'userid1='+userid+'&admin1='+admin+'&projectid1='+projectid+'&getChatid='+'test',
                    async:false,
                    success: function (result) {
                           
                      chatid=result;

                      $.ajax({
              url: "clientchat.php",
              type:'POST',
              data:'chatid1='+chatid+'&action='+'test',
              cache: false,
              success: function(html){
                
                $("#messagebox").html(html);
              }
            });
                    }
                });

            
        })
        
    });
    </script>
    <script type="text/javascript">
    $(function() {
    var userid = $('#userid').val();
var admin = $('#admin').val();
var projectid = $('#projectid').val();
     $.ajax({ 
                    url: 'clientchat.php',
                    type: 'POST',
                    data:'userid1='+userid+'&admin1='+admin+'&action='+'sendMessage'+'&projectid1='+projectid,
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
var projectid = $('#projectid').val();

if(detail=='')
{
    alert('please fill all the field');
}
else
{
     $.ajax({ 
                    url: 'clientchat.php',
                    type: 'POST',
                    data:'detail1='+detail+'&userid1='+userid+'&admin1='+admin+'&projectid1='+projectid,
                    async:false,
                    success: function (result) {
                        
                    }
                });

    
    var detail = $('#detail').val('');

    
}

 $.ajax({           

                    url: 'clientchat.php',
                    type: 'POST',
                    data:'userid1='+userid+'&admin1='+admin+'&action='+'sendMessage'+'&projectid1='+projectid,
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