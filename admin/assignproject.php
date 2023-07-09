<?php
session_start();
require'../classes/user.php';
$obj = new User;
$title = 'ViewUsers';
if(!isset($_SESSION['adminlogin']))
{
  header('location:login.php');
}
else
{

if(isset($_POST['search']))
{
	if(!empty($_POST['searchvalue']))
	{
		$search = $_POST['searchvalue'];
	}
	else
	{
		$search = '';
	}

	if(!empty($_POST['searchskills']))
	{
		$skill = $_POST['searchskills'];
	}
	else
	{
		$skill = '';
	}

	$users = $obj->searchProjectUsers($search,$skill,$_GET['projectid']);
	}
	else
	{
	$users = '';
	}

	

if(isset($_GET['delid']))
{
	$obj->deleteUser($_GET['delid']);
}

if(isset($_POST['submit']))
{		

		$success = $obj->assignProject($_POST,$_GET['projectid'],$_SESSION['adminid']);
		if($success==true)
 		{
   echo "<script>alert('Project assined successfully')
    window.location='viewprojects.php';
   </script>";
 	}
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
		
		

		<h2>View Users</h2>
		</br>
		<div class="row">
				<div class="col-md-12">
					<form method="POST" action="">
					<div class="form-group">
                	<div class="col-md-3">
                		<input type="text" name="searchvalue" class="form-control" placeholder="Search By Name OR Email">
                	</div>
                	<div class="col-md-3">
                		<input type="text" name="searchskills" class="form-control" placeholder="Search By Skills">
                	</div>
                	
                	<div class="col-md-1">
                		<input type="submit" name="search" class="btn btn-primary" value="Search">
                	</div>
					</div>
					</form>
					<br><br><br>
		</div>
			
		</div>
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
		<?php if(!empty($users)):?>
		<form method="POST" action=""
		<div class="col-md-12">
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Skills</th>
				<th colspan="3">Action</th>
			</tr>
			<?php foreach($users as $user):?>
			<tr>
				<td><?php echo $user['fname'];?>  <?php echo $user['lname'];?></td>
				<td><?php echo $user['email'];?></td>
				<td><?php echo $user['phone'];?></td>
				<td><?php echo $user['skills'];?></td>
				<!-- <td><button class="btn btn-sm btn-info" name="submit" type="submit" value="<?php echo $user['id'];?>">Assign<span><i class="entypo-check"></i></span></button></a></td> -->
				<td><button class="btn btn-sm btn-info" data-toggle='modal' id="checkmodel" data-target='#myModal' type="button" value="<?php echo $user['id'];?>" onclick="myFunction(<?php echo $user['id'];?>)">Assign<span><i class="entypo-check"></i></span></button></a></td>
				
			</tr>
			<?php endforeach;?>
		</table>
	</div>
</form>
<?php else:?>
<?php endif;?>
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

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content popup-margin" style="margin-top:150px;width:auto;height:auto;margin-left:auto;margin-right:auto;">
        <div class="modal-header" style="background-color:grey">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#fff;">Assign Project</h4>
        </div>
        <div class="modal-body" style="height:300px;">
           <form method="POST" action="">
           	<div class="col-md-12">
           	<label class="label-control">Freelancer Title</label>
           	<input type="text" name="title" class="form-control" placeholder="Designer,Developer">
           	</div>
           	<div class="col-md-12">
           	<label class="label-control">Freelancer Budget</label>
           	<input type="text" name="budget" class="form-control" placeholder="Budget">
           	</div>
           	<div class="col-md-12">
           	<label class="label-control">Freelancer Description</label>
           	<textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
           	</div>
           	<div class="col-md-12">
           		<br>
           		<button class="btn btn-sm btn-info" id="submitid" name="submit" type="submit" value="<?php echo $user['id'];?>">Assign<span><i class="entypo-check"></i></span></button>
           	</div>

           </form>
      </div>
      
    </div>
  </div>
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

function myFunction(id)
{
$('#submitid').val(id);
}

// $('#checkmodel').on('click',function(){
// var userid = $('#checkmodel').val();
// alert(userid);
// $('#submitid').val(userid);
// });
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