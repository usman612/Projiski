<?php
require '../classes/user.php';
$obj = new User;
session_start();
if(!isset($_SESSION['adminlogin']))
{
  header('location:login.php');
}
else
{


if(isset($_GET['email1']))
{
	$result = $obj->changePassword($_GET['oldpassword1'],$_GET['newpassword1'],$_GET['email1']);
	if($result==true)
	{
		echo "<p style='color:green;'>Password changed successfully.</p>";
		exit;
	}
	else
	{
		echo "<p style='color:red;'>Email and Password is incorrect.Please type correct.</p>";
		exit;
	}
}	
	

// $instructors = $obj->getTotalInstructors();

$learners = $obj->getTotalLearners();
$pendingUsers = $obj->getPendingUsers();
$projects = $obj->getPendingProjects();


if(isset($_GET['userid1']))
{
	$obj->approveUserAccount($_GET['userid1'],$_GET['activeinfo1']);
}
if(isset($_GET['project']))
{
	$obj->approveProject($_GET['project'],$_GET['activeinfo1']);
}

if(isset($_GET['learner1']))
{
	$obj->approveLearnerAccount($_GET['learner1'],$_GET['activeinfo1']);
}

// echo "<pre>";
// print_r($pendingUsers);
// echo "</pre>";
// die();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<link rel="icon" href="assets/images/favicon.ico">
	<title>Admin | Dashboard</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
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
		
		
		<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			// Sample Toastr Notification
			
		
		
			// JVector Maps
			var map = $("#map");
		
			map.vectorMap({
				map: 'europe_merc_en',
				zoomMin: '3',
				backgroundColor: '#383f47',
				focusOn: { x: 0.5, y: 0.8, scale: 3 }
			});
		
		
		
			
		
		
		function getRandomInt(min, max)
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>
	<!-- 	
		<h5 style="text-align:right;color:blue;cursor:pointer;"  data-toggle='modal' data-target='#myModal5'><u>Change Password</u></h5> -->
		<div class="row">
			<div class="col-sm-4 col-xs-6">
				<a href="viewusers.php">
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num"  data-postfix="" data-duration="1500" data-delay="0">
						<?php 
						if($learners['tlearners'] < 10){

							echo "0".$learners['tlearners'];}
							else{
							echo $learners['tlearners'];

						}?></div>
		
					<h3>Users</h3>
					<p>For Users</p>
				</div>
				</a>
		
			</div>
<?php $myprojects = $obj->getTotalProjects(); ?>
			<div class="col-sm-4 col-xs-6">
				<a href="viewprojects.php">
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num"  data-postfix="" data-duration="1500" data-delay="0">
						<?php 
						if($myprojects['tprojects'] < 10){

							echo "0".$myprojects['tprojects'];}
							else{
							echo $myprojects['tprojects'];

						}?></div>
		
					<h3>Projects</h3>
					<p>For Projects</p>
				</div>
				</a>
		
			</div>
			
			
		
			
			<div class="clear visible-xs"></div>
			
		</div>
		
		<br />


			<div class="row">
			<div class="col-sm-12">
				<h4><b>Users(<?php echo $pendingUsers['second'];?>)</b></h4>
				<div class="panel panel-primary" style="height:300px;overflow-y:auto;">
					<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>UserType</th>
							<th>County</th>
							<th colspan="2">Action</th>
						</tr>
						<?php foreach($pendingUsers['first'] as $user):?>
						<tr>
							<td><?php echo $user['fname'];?> <?php echo $user['lname'];?></td>
							<td><?php echo $user['email'];?></td>
							<td><?php if($user['usertype']=='user'){echo 'Freelancer';}else{echo $user['usertype'];}?></td>
							<?php if($user['usertype']=='user'):?>
							<td><?php echo  $user['county'];?></td>
							<?php else:?>
							<?php endif;?>
							<td><button class="btn btn-danger" onclick="approveUserAccount(<?php echo $user['id'];?>,2)">Cancel</button></td>
							<td><button class="btn btn-success" onclick="approveUserAccount(<?php echo $user['id'];?>,1)">Approve</button></td>
						</tr>
						<?php endforeach;?>
					</table>
						
		
					</div>
		
					
		
				</div>
			</div>
			<div class="col-sm-12">
				<h4><b>Projects(<?php echo count($projects);?>)</b></h4>
				<div class="panel panel-primary" style="height:300px;overflow-y:auto;">
					<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>Name</th>
							<th>Budget</th>
							<th>Date</th>
							<th colspan="4">Action</th>
						</tr>
						<?php foreach($projects as $project):?>
						<tr>
							<td><?php echo $project['project_about'];?></td>
							<td>$<?php echo $project['budget'];?></td>
							<td><?php echo $project['date'];?></td>
							<td><a href="singleproject.php?projectid=<?php echo $project['project_id'];?>&userid=<?php echo $project['user_id'];?>"><button class="btn btn-info">Detail</button></a></td>
							<td><a href="editbudget.php?projectid=<?php echo $project['project_id'];?>"><button class="btn btn-info">Edit Budget</button></a></td>
							<td><button class="btn btn-danger" onclick="approveProject(<?php echo $project['project_id'];?>,2)">Cancel</button></td>
							<td><button class="btn btn-success" onclick="approveProject(<?php echo $project['project_id'];?>,1)">Approve</button></td>
						</tr>
						<?php endforeach;?>
					</table>
						
		
					</div>
		
					
		
				</div>
			</div>

			
		
		<div class="row">
			
		
			<div class="row">
			<div class="col-sm-6">
				<!-- <h4><b>Withdraw Requests(<?php echo $pendingRequests['second'];?>)</b></h4>
				<div class="panel panel-primary" style="height:300px;overflow-y:auto;">
					<div class="panel-body">
		
						<div class="tab-content">	
						<?php foreach($pendingRequests['first'] as $shop):?>
						<div style="width:100%;height:40px;background-color:#00a65a;margin-bottom:5px;">
							<p style="padding:10px;color:#fff;"><span><?php echo $shop['shop_name'];?><span/>  Wants to Widthdraw Money.<span style="float:right;padding-left:2px;color:#fff;cursor:pointer;" onclick="transferMoney(<?php echo $shop['shop_id'];?>,<?php echo $shop['request_id'];?>,<?php echo $shop['withdraw_amount'];?>,2)">Cancel</span> <a href=""><span style="float:right;color:#fff;cursor:pointer;" onclick="transferMoney(<?php echo $shop['shop_id'];?>,<?php echo $shop['request_id'];?>,<?php echo $shop['withdraw_amount'];?>,1)">Transfer /</span></a></p>
						</div>
					<?php endforeach;?>
					<br>
						</div>
		
					</div> -->
		
					
		
				</div>
				
		
			</div>
		
		
		<br />
		
		
		
		<script type="text/javascript">
			// Code used to add Todo Tasks
			jQuery(document).ready(function($)
			{
				var $todo_tasks = $("#todo_tasks");
		
				$todo_tasks.find('input[type="text"]').on('keydown', function(ev)
				{
					if(ev.keyCode == 13)
					{
						ev.preventDefault();
		
						if($.trim($(this).val()).length)
						{
							var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
							$(this).val('');
		
							$todo_entry.appendTo($todo_tasks.find('.todo-list'));
							$todo_entry.hide().slideDown('fast');
							replaceCheckboxes();
						}
					}
				});
			});
		</script>
		
		
		
		<!-- Footer -->
		<footer class="main">
			
			&copy; 2017  Developed  By <a href="http://www.intimatetec.com" target="_blank">IntimateTec</a>
		
		</footer>
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

	<!-- Sample Modal (Default skin) -->
	<div class="modal fade" id="sample-modal-dialog-1">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Widget Options - Default Modal</h4>
				</div>
				
				<div class="modal-body">
					<p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Sample Modal (Skin inverted) -->
	<div class="modal invert fade" id="sample-modal-dialog-2">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
				</div>
				
				<div class="modal-body">
					<p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Sample Modal (Skin gray) -->
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:150px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Project Detail</h4>
        </div>
        <div class="modal-body">
        	<p><span><b>Project Title : </b></span><span id="p-title"></span></p>
          <p id="p-description"></p>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:150px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cancel College Request</h4>
        </div>
        <div class="modal-body">
          Are you sure you want to Cancel this Request?
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success" data-dismiss="modal" id="college-cancel">Yes</button>	
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">No</button>
        </div>
      </div>
      
    </div>
  </div>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:100px;width:300px;height:auto;margin-left:auto;margin-right:auto;">
        <div class="modal-header" style="background-color:#3db7ef;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title" style="color:#fff;">Change Password</h5>
        </div>
        <div class="modal-body">
            <p id="body-description"></p>
                <br><br>
                <!-- <button class="btn btn-default" style="width:250px;background:#feb71f;" id="pickup" style="display:none;">Order a Pick Up</button><br/><br>  -->                
        </div>
        
      </div>
      
    </div>
  </div>

   

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>
	<script src="assets/js/toastr.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>
	<script type="text/javascript">
	function approveUserAccount(userid,activeinfo)
	{		
		if(activeinfo==1)
		{
		if(confirm('Are you sure you want to Approve this User Account?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?userid1='+userid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	               
	                       window.location='index.php';

	                        //document.write(output);
	                    }
	                });
	            }
	    }
	    else
	    {
	    	if(confirm('Are you sure you want to Cancel this User Account?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?userid1='+userid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	                    	
	                       window.location='index.php';
	                        //document.write(output);
	                    }
	                });
	            }
	    }        
	}

	function approveProject(projectid,activeinfo)
	{		
		if(activeinfo==1)
		{
		if(confirm('Are you sure you want to Approve this Project?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?project='+projectid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	               
	                       window.location='index.php';

	                        //document.write(output);
	                    }
	                });
	            }
	    }
	    else
	    {
	    	if(confirm('Are you sure you want to Cancel this Project?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?project='+projectid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	                    	
	                       window.location='index.php';
	                        //document.write(output);
	                    }
	                });
	            }
	    }        
	}

	function approveLearnerAccount(userid,activeinfo)
	{		
		if(activeinfo==1)
		{
		if(confirm('Are you sure you want to Approve this User Account?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?learner1='+userid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	               
	                       window.location='index.php';

	                        //document.write(output);
	                    }
	                });
	            }
	    }
	    else
	    {
	    	if(confirm('Are you sure you want to Cancel this User Account?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?learner1='+userid +'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	                    	
	                       window.location='index.php';
	                        //document.write(output);
	                    }
	                });
	            }
	    }        
	}

	function transferMoney(shopid,requestid,amount,activeinfo)
	{
		if(activeinfo==1)
		{
			

		if(confirm('Are you sure you want to Transfer MOney?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?withdrawshopid='+shopid +'&requestid='+requestid+'&amount='+amount+'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	               
	                       window.location='index.php';
	                        
	                    }
	                });
	            }
	    }
	    else
	    {
	    	if(confirm('Are you sure you want to Cancel withdraw Request?'))
	            {
	                
	                $.ajax({ 
	                    url: 'index.php?withdrawshopid='+shopid +'&requestid='+requestid+'&amount='+amount+'&activeinfo1='+activeinfo,
	                    type: 'GET',
	                    success: function (result) {
	                    alert(result);
	                       window.location='index.php';
	                        //document.write(output);
	                    }
	                });
	            }
	    }
	}

	$('#submit').on('click',function(){

		var email = $('#email').val();
		var oldpassword = $('#oldpassword').val();
		var newpassword = $('#newpassword').val();

		$.ajax({ 
	                    url: 'index.php?email1='+email +'&oldpassword1='+oldpassword+'&newpassword1='+newpassword,
	                    type: 'GET',
	                    success: function (result) {
	                    
	                       $('#password_status').html(result);
	                        //document.write(output);
	                    }
	                });
		$('#email').val('');
		 $('#oldpassword').val('');
		 $('#newpassword').val('');

	});

	
	function getDescription(data,title)
	{
		$('#p-title').text(title);
		$('#p-description').text(data);
	}
	
	</script>

</body>
</html>
<?php } ?>