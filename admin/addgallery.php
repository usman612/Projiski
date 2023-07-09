<?php
ob_start();
session_start();
require'../classes/gallery.php';
$obj = new Gallery;
$title = 'Add Gallery';
if(!isset($_SESSION['login']))
{
  header('location:login.php');
}
else
{

if(isset($_GET['photoid']))
 {
    $obj->deletePhoto($_GET['photoid']);
 }	
if(isset($_GET['gid']))
{
	$singlegallery = $obj->getSingleGallery($_GET['gid']);
}
if(isset($_GET['delid']))
{
	$obj->deleteCategory($_GET['delid']);

}
$gallery = $obj->getAllGallery();

if(isset($_POST['search']))
{
	$categories = $obj->searchData($_POST['searchvalue']);

}
if(isset($_POST['submit']))
{	
	
	if(isset($_GET['gid']))
	{

	if(empty($_POST['status']))
		{
			$status=0;
		}
		else
		{
			$status=1;
		}

	if(!empty($_FILES['image']['name']))
    {
	
	$add = explode(".", $_FILES['image']['name']);
           
            $name = time();
            if (move_uploaded_file($_FILES['image']['tmp_name'], '../images/gallery/gallery_image' . $name . "." . $add[1])) {

            } else {
                echo "Failed to upload file Contact Site admin to fix the problem";
            }

            $imgName = 'gallery_image' . $name . "." . $add[1];	
    }
    else{
    	$imgName = '';
    	}
		$update = $obj->updateGallery($_GET['gid'],$_POST,$imgName,$status);
		header('location:viewgallery.php');
		if ($update) {
            $_SESSION['message1'] = '<b>Success!</b> Data Updated successfully.';
        } else {
            $_SESSION['message1'] = '<b>Error!</b> Data could not be Updated.';
        }
	}
	else{

		if(empty($_POST['status']))
		{
			$status=0;
		}
		else
		{
			$status=1;
		}
	if(!empty($_FILES['image']['name']))
    {
	
	$add = explode(".", $_FILES['image']['name']);
           
            $name = time();
            if (move_uploaded_file($_FILES['image']['tmp_name'], '../images/gallery/gallery_image' . $name . "." . $add[1])) {

            } else {
                echo "Failed to upload file Contact Site admin to fix the problem";
            }

            $imgName = 'gallery_image' . $name . "." . $add[1];	
    }
    else{
    	$imgName = '';
    	}	
	$save = $obj->saveGallery($_POST,$imgName,$status);
	
		if ($save===true) {
            $_SESSION['alert'] = '<b>Success!</b> Data saved successfully.';
        } 
        if ($save===false) {
            $_SESSION['alert1'] = '<b>False!</b>  Data Already Exist.';
        } 
	}	
	header("Location:viewgallery.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('header.php'); ?>

	<div class="main-content">
				
		<div class="row">
	
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
		
		<h2>Add Gallery</h2>
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
							<label for="field-1" class="col-sm-3 control-label">Name</label>
								
								<div class="col-md-4 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Name" name="name" value="<?php echo isset($singlegallery['gallery_name'])?$singlegallery['gallery_name']:""?>" required>
								</div>
							</div>

							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Text</label>
								
								<div class="col-md-4 col-sm-6">
									<textarea class="form-control" name="text" placeholder="Text"><?php echo isset($singlegallery['gallery_text'])?$singlegallery['gallery_text']:""?></textarea>
								</div>
							</div>
							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Description</label>
								
								<div class="col-md-4 col-sm-6">
									<textarea class="form-control" name="description" placeholder="Description"><?php echo isset($singlegallery['gallery_description'])?$singlegallery['gallery_description']:""?></textarea>
									
								</div>
							</div>
							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Image</label>
								
								<div class="col-md-4 col-sm-6">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="input-group">
											<div class="form-control uneditable-input" data-trigger="fileinput" style="width:175px;">
												<i class="glyphicon glyphicon-file fileinput-exists"></i>
												<span class="fileinput-filename"></span>
											</div>
											<span class="input-group-addon btn btn-default btn-file">
												<span class="fileinput-new">Select file</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="image">
											</span>
											<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
										</div>
									</div>
									<label><p style="background: #e3e3e3;width:auto;padding:1px;"><?php if(!empty($singlegallery['gallery_image'])):?><?php echo $singlegallery['gallery_image'];?><span><img src="../images/cross1.png" onclick="delPhoto(<?php echo $singlegallery['gallery_id'];?>)"></span><?php else:?><?php endif;?></p></label>
								</div>
							</div>
							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Status</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="checkbox" id="field-1" placeholder="Name" name="status" value="1" <?php if(isset($singlegallery['status'])){if($singlegallery['status']==1){echo 'checked';}}?>>
								</div>
							</div>
							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">IsActive-Description</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="checkbox" id="field-1" placeholder="Name" name="des_status" value="1" <?php if(isset($singlegallery['isDescription'])){if($singlegallery['isDescription']==1){echo 'checked';}}?>>
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
	<script src="assets/js/fileinput.js"></script>

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
	                    url: 'addgallery.php?delid='+sid,
	                    type: 'GET',
	                    success: function (result) {
	                        //alert(output);
	                       window.location='addgallery.php';
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
                    url: 'addgallery.php?photoid='+sid,
                    type: 'GET',
                    success: function (result) {
                        //alert(output);
                       window.location='addgallery.php?gid='+sid;
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
?>