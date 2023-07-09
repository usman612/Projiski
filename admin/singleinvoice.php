<?php
session_start();
require'../classes/project.php';
$obj = new Project;
$title = 'Single Project';
if(!isset($_SESSION['adminlogin']))
{
  header('location:login.php');
}
else
{


if(isset($_GET['project']))
{
	$obj->approveInvoice($_GET['project'],$_GET['activeinfo1']);
}
	
if(isset($_GET['invoiceid']))
{
    $singleinvoice = $obj->getSingleInvoiceForAdmin($_GET['invoiceid']); 

}

if(isset($_POST['submit']))
{		

	
}

else
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('header.php'); ?>

	<div class="main-content">
				
		<div class="row">
		
			
		
			<!-- Raw Links -->
			<div class="col-md-12 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
					<li>
						
							<span style="color:orange;"><?php echo $_SESSION['adminlogin'];?> </span>
						
					</li>
					<li class="sep"></li>
					<li>
						<a href="logout.php">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
					
				</ul>
		
			</div>
		
		</div>
		
		<hr />
		
		

		<h2>Single Invoice Detail</h2>
		<p style="float:right;"><button class="btn btn-success" onclick="approveInvoice(<?php echo $singleinvoice['invoice_id'];?>,1,<?php echo $_GET['userid'];?>,<?php echo $_GET['projectid'];?>)">Approve</button>
               <button class="btn btn-danger" onclick="approveInvoice<?php echo $singleinvoice['invoice_id'];?>,2,<?php echo $_GET['userid'];?>,<?php echo $_GET['projectid'];?>)">Cancel</button></p>
		</br>
		
		<p id="message">
                              <?php
                            
                                     if (isset($_SESSION['alert'])) {
                                       echo '<p style="color:green;">'.$_SESSION['alert'].'</p>';
                                      
                                    }
                                    if (isset($_SESSION['alert1'])) {
                                       echo '<p style="color:red;">'.$_SESSION['alert1'].'</p>';
                                      
                                    }

                                     if (isset($_SESSION['message1'])) {
                                       echo '<p style="color:green;">'.$_SESSION['message1'].'</p>';
                                         
                                    }


                                ?>
                            </p>
		<div class="row">
			<!-- <h4 style="text-align:right;padding-right:50px;"><a href="changepassword.php?userid=<?php echo $users[0]['user_id'];?>">Change Password</a></h4> -->
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					
					
					
				
				</div>
			
			</div>
		</div>

		 <div class="col-md-8" style="height:495px;background:#fff;color:#000;border:1px solid grey;">

		 				 <h3 style="text-align:center;padding-top:2px;">User Detail</h3>
                        <hr>
                        <div class="col-md-6"><b>Name :</b> </div>
                    	<div class="col-md-6"><?php echo $singleinvoice['fname'];?> <?php echo $singleinvoice['lname'];?> </div>
                        <div class="col-md-6"><b>Email :</b> </div>
                    	<div class="col-md-6"><?php echo $singleinvoice['email'];?> </div>
                    	<div class="col-md-6"><b>Phone :</b> </div>
                    	<div class="col-md-6"><?php echo $singleinvoice['phone'];?> </div>
                    	<br><br><br>
                        <h3 style="text-align:center;padding-top:2px;">Invoice Detail</h3>
                        <hr>

                        <?php if(empty($singleinvoice)):?>

                        <p style="text-align:center;">No invoice selected</p>
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

	<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">
	
		<div class="chat-inner">
	
	
			<h2 class="chat-header">
				<a href="#" class="chat-close"><i class="entypo-cancel"></i></a>
	
				<i class="entypo-users"></i>
				Chat
				<span class="badge badge-success is-hidden">0</span>
			</h2>
	
	
			<div class="chat-group" id="group-1">
				<strong>Favorites</strong>
	
				<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
				<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
				<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
				<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
				<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
			</div>
	
	
			<div class="chat-group" id="group-2">
				<strong>Work</strong>
	
				<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
				<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
				<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
			</div>
	
	
			<div class="chat-group" id="group-3">
				<strong>Social</strong>
	
				<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
				<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
				<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
				<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
			</div>
	
		</div>
	
		<!-- conversation template -->
		<div class="chat-conversation">
	
			<div class="conversation-header">
				<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>
	
				<span class="user-status"></span>
				<span class="display-name"></span>
				<small></small>
			</div>
	
			<ul class="conversation-body">
			</ul>
	
			<div class="chat-textarea">
				<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
			</div>
	
		</div>
	
	</div>
	
	
	<!-- Chat Histories -->
	<ul class="chat-history" id="sample_history">
		<li>
			<span class="user">Art Ramadani</span>
			<p>Are you here?</p>
			<span class="time">09:00</span>
		</li>
	
		<li class="opponent">
			<span class="user">Catherine J. Watkins</span>
			<p>This message is pre-queued.</p>
			<span class="time">09:25</span>
		</li>
	
		<li class="opponent">
			<span class="user">Catherine J. Watkins</span>
			<p>Whohoo!</p>
			<span class="time">09:26</span>
		</li>
	
		<li class="opponent unread">
			<span class="user">Catherine J. Watkins</span>
			<p>Do you like it?</p>
			<span class="time">09:27</span>
		</li>
	</ul>
	
	
	
	
	<!-- Chat Histories -->
	<ul class="chat-history" id="sample_history_2">
		<li class="opponent unread">
			<span class="user">Daniel A. Pena</span>
			<p>I am going out.</p>
			<span class="time">08:21</span>
		</li>
	
		<li class="opponent unread">
			<span class="user">Daniel A. Pena</span>
			<p>Call me when you see this message.</p>
			<span class="time">08:27</span>
		</li>
	</ul>

	
</div>




	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>

	<script src="assets/js/datepicker.js"></script>  
	<!-- Imported scripts on this page -->
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>
	<script type="text/javascript">
	$(function() {
    $( "#datepicker" ).datepicker();
  });
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
		$('.variation-block').hide();
		});
		$('#novariation').on('click',function(){

			$('.constant-form').show();
			$('.variation-block').hide();


		});
		$('#isvariation').on('click',function(){

			$('.variation-block').show();
			$('.constant-form').hide();

		});

		var regex = /^(.*)(\d)+$/i;
    var cloneIndex = $(".clonedInput").length;
    if ($(".clonedInput").length == 1) {
        $('.remove').hide();
    } else {
        $('.remove').show();
    }

    function clone() {
        $(this).parents(".clonedInput").clone()
            .appendTo(".tbodyClone").find("input:text").val('')
            .attr("id", "clonedInput" + cloneIndex)
            .find("*")
            .each(function () {
                var id = this.id || "";
                var match = id.match(regex) || [];
                if (match.length == 3) {
                    this.id = match[1] + (cloneIndex);
                }
            })
            .on('click', 'clone', clone)
            .on('click', 'remove', remove);

        cloneIndex++;

        //se tem só uma linha esconde o delete
        console.log("Total de linhas => " + $(".clonedInput").length);
      
        if ($(".clonedInput").length == 1) {
            $('.remove').hide();
        } else {
            $('.remove').show();
        }

    }
    function remove() {        
        $(this).parents(".clonedInput").remove();

        if ($(".clonedInput").length == 1) {
            $('.remove').hide();
        } else {
            $('.remove').show();
        }

    }    
    $(document).on("click", ".clone", clone);
    $(document).on("click", ".remove", remove);
	</script>
	<script type="text/javascript">
	function delData(id)
	{   	
	    var sid = id;
	     if(confirm('Are you sure you want to delete this file?'))
	            {
	                
	                $.ajax({ 
	                    url: 'adduser.php?delid='+sid,
	                    type: 'GET',
	                    success: function (result) {
	                        //alert(output);
	                       window.location='adduser.php';
	                        //document.write(output);
	                    }
	                });
	            }
	}

	function delPhoto(id)
{   
    var sid = id;
     if(confirm('Are you sure you want to delete this file?'))
            {
                
                $.ajax({ 
                    url: 'addproduct.php?photoid='+sid,
                    type: 'GET',
                    success: function (result) {
                        //alert(output);
                       window.location='addproduct.php?pid='+sid;
                        //document.write(output);
                    }
                });
            }
}

function approveInvoice(invoiceid,activeinfo,userid,projectid)
	{		
		if(activeinfo==1)
		{
		if(confirm('Are you sure you want to Approve this invoice?'))
	            {
	                
	                $.ajax({ 
	                    url: 'singleinvoice.php?project='+invoiceid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	               
	                       window.location='adminprojectbasechat.php?userid='+userid+'&projectid='+projectid;

	                        //document.write(output);
	                    }
	                });
	            }
	    }
	    else
	    {
	    	if(confirm('Are you sure you want to Cancel this Invoice?'))
	            {
	                
	                $.ajax({ 
	                    url: 'singleinvoice.php?project='+invoiceid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	                    	
	                       window.location='adminprojectbasechat.php?userid='+userid+'&projectid='+projectid;
	                    }
	                });
	            }
	    }        
	}
</script>

</body>
</html>
<?php 

$_SESSION['alert']='';
$_SESSION['alert1']=''; 
$_SESSION['message1']='';   
}
}

?>