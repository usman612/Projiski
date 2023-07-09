<?php
session_start();
require'../classes/faq.php';
$obj = new Faq;
$title = 'addFaq';
if(!isset($_SESSION['login']))
{
  header('location:login.php');
}
else
{

if(isset($_GET['fid']))
{
	$singlefaq = $obj->getSingleFaq($_GET['fid']);

}
if(isset($_GET['delid']))
{
	$obj->deleteCategory($_GET['delid']);

}

if(isset($_POST['search']))
{
	$categories = $obj->searchData($_POST['searchvalue']);
}

if(isset($_POST['submit']))
{	
	if(isset($_GET['fid']))
	{
		$update = $obj->updateFaqs($_GET['fid'],$_POST['heading'],$_POST['question']);

		if ($update) {
            $_SESSION['message1'] = '<b>Success!</b> Data Updated successfully.';
        } else {
            $_SESSION['message1'] = '<b>Error!</b> Data could not be Updated.';
        }
	}
	else{

		
		
	$save = $obj->saveFaq($_POST['heading'],$_POST['question'],$_POST['answer'],$_POST['points']);
	
		if ($save===true) {
            $_SESSION['alert'] = '<b>Success!</b> Data saved successfully.';
        } 
        if ($save===false) {
            $_SESSION['alert1'] = '<b>False!</b>  Data Already Exist.';
        } 

	}


	header('location:viewfaqs.php');

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
						
							<span style="color:orange;"><?php echo $_SESSION['login'];?> </span>
						
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
		
		

		<h2>Update Faq's</h2>
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
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					
					
					<div class="panel-body">
						
						<form role="form" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
							

							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Heading</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Heading" name="heading" value="<?php echo isset($singlefaq['first']['heading'])?$singlefaq['first']['heading']:""?>" required>
								</div>
							</div>

							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Question</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Question" name="question" value="<?php echo isset($singlefaq['first']['question'])?$singlefaq['first']['question']:""?>" required>
								</div>
							</div>
						
            
    
								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label"></label>
								<div class="col-md-2 col-sm-2 col-xs-12">
									<button type="submit" class="btn btn-default" name="submit">Save</button>
								</div>
							</div>				
							
						</form>
						
					</div>
				
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


	<!-- Imported scripts on this page -->
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>
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
		$('#add_exercise').on('click', function() { 
    $('#exercises').append('<div class="exercise"><input type="text" placeholder="points" name="points[]" style="width:207px;"><button class="remove">x</button></div>');
    return false; //prevent form submission
});

$('#exercises').on('click', '.remove', function() {
    $(this).parent().remove();
    return false; //prevent form submission
});

		
   
	</script>
	<script type="text/javascript">
	function delData(id)
	{   	
	    var sid = id;
	     if(confirm('Are you sure you want to delete this file?'))
	            {
	                
	                $.ajax({ 
	                    url: 'addcategory.php?delid='+sid,
	                    type: 'GET',
	                    success: function (result) {
	                        //alert(output);
	                       window.location='addcategory.php';
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