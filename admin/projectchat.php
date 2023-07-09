<?php
session_start();
require'../classes/project.php';
$obj = new Project;
$title = 'General Communication';
if(!isset($_SESSION['adminlogin']))
{
  header('location:login.php');
}



if(isset($_POST['getChatid']))
{
 echo $chatid = $obj->getChatId($_POST['projectid1'],$_POST['userid1'],$_POST['admin1']);
 exit();
}

if(isset($_POST['detail1']))
{	
	$obj->saveProjectCommunication($_POST['detail1'],$_POST['userid1'],$_POST['admin1'],$_POST['projectid1']);
}
if(isset($_POST['action']))
{	if(empty($_POST['chatid1']))
	{
		$_POST['chatid1']='';
	}
	$result = $obj->getProjectCommunication($_POST['chatid1']);
	$chat='';
	foreach($result as $row)
	{
		$chat.='<p style="padding-left:10px;">'.'<span style="font-weight:bold;">'.$row['fname'].'</span>'. ' : &nbsp;&nbsp;' . $row['message'].'</p>';
	}

	echo $chat;
	exit();
}

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
		
		

		
		</br>
		<div class="row">
			<p id="message" style="text-align:center;color:green;"></p>
				

		<div class="col-md-12">
			<h2 style="padding-left:8px;">Messages</h2>
			<div style="width:100%;height:250px;border:1px solid grey;overflow-y:scroll;padding:7px;background:#eee;" id="messagebox"></div>
		</div>
		<div class="col-md-12">
				
					<form method="POST" action="">
					
                	<div class="form-group">
                	<br>
                		<textarea class="form-control" id="detail" placeholder="Enter Your Text" cols="10" rows="2" name="detail"></textarea>
                	</div>
					</div>
					<input type="hidden" id="userid" value="<?php echo $_GET['userid'];?>">
					<input type="hidden" id="admin" value="<?php echo $_SESSION['adminid'];?>">
					<input type="hidden" id="projectid" value="<?php echo $_GET['projectid'];?>">
					<input type="hidden" id="chatid" value="<?php echo $chatid;?>">
					<div class="form-group">
                	<div class="col-md-12">
					<input class="btn btn-md btn-success" id="submit" type="button" name="submit" value="Send Message" style="float:right;">
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
	<script type="text/javascript" src="../jquery.timers-1.0.0.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function()
	{
		var userid = $('#userid').val();
		var admin = $('#admin').val();
		var projectid = $('#projectid').val();
		var chatid;
		
		$("#messagebox").everyTime(1000,function(i){
			$.ajax({ 
                    url: 'projectchat.php',
                    type: 'POST',
                    data:'admin1='+admin+'&projectid1='+projectid+'&getChatid='+'test'+'&userid1='+userid,
                    async:false,
                    success: function (result) {
                    		
                      chatid=result;

                      $.ajax({
			  url: "projectchat.php",
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
    $( "#datepicker" ).datepicker();
    var userid = $('#userid').val();
var admin = $('#admin').val();

var projectid = $('#projectid').val();
     $.ajax({ 
                    url: 'projectchat.php',
                    type: 'POST',
                    data:'userid1='+userid+'&admin1='+admin+'&action='+'sendMessage'+'&projectid1='+projectid,
                    success: function (result) {
                        $('#messagebox').html(result);
                    }
                });
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
                    url: 'projectchat.php',
                    type: 'POST',
                    data:'detail1='+detail+'&userid1='+userid+'&admin1='+admin+'&projectid1='+projectid,
                    async:false,
                    success: function (result) {
                    	
                    }
                });

	
	var detail = $('#detail').val('');

	
}

 $.ajax({ 			

                    url: 'projectchat.php',
                    type: 'POST',
                    data:'userid1='+userid+'&admin1='+admin+'&action='+'sendMessage'+'&projectid1='+projectid,
                    success: function (result) {
                        $('#messagebox').html(result);
                    }
                });

});
</script>

</body>
</html>
<?php 

$_SESSION['alert']='';
$_SESSION['alert1']=''; 
$_SESSION['message1']='';   



?>