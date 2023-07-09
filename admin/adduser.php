<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();
require'../classes/user.php';
$obj = new User;
$title = 'AddUser';
if(!isset($_SESSION['adminlogin']))
{
  header('location:login.php');
}
else
{
$officeinfo = $obj->getOfficeInfo($_SESSION['parentoffice']);
$users = $obj->getAllUsers();
$cities = $obj->getAllCities();
$countries = $obj->getAllCountries();	
$roles = $obj->getAllRoles();
$membershipno = $obj->getMembershipno();
$offices = $obj->getAllOffices();

if(isset($_GET['countryid']))
{
	$dynamiccity = $obj->getDynamicCities($_GET['countryid']);
	$temp='';
	$temp.="<select name='city' id='cityid' class='form-control' onchange='myFunction1()'>";
	$temp.="<option>Select City</option>";
	foreach($dynamiccity as $data)
	{
		$temp.="<option value=".$data['city_id'].">".$data['city']."</option>";
	}
	$temp.="<select>";
	echo $temp;
	exit();
}

if(isset($_GET['cityid']))
{
	$dynamicoffice = $obj->getDynamicOffices($_GET['cityid']);
	$temp1='';
	$temp1.="<select name='officeid' class='form-control'>";
	$temp1.="<option value=''>Select Branch</option>";
	foreach($dynamicoffice as $data)
	{
		$temp1.="<option value=".$data['office_id'].">".$data['office_name']."</option>";
	}
	$temp1.="<select>";
	echo $temp1;
	exit();
}
	
if(isset($_GET['userid']))
{
	$singleUser = $obj->getSingleUser($_GET['userid']);
	$selectedCountry = $obj->getUserSelectedCountry($_GET['userid']);
	$selectedCity = $obj->getUserSelectedCity($_GET['userid']);
	$selectedRole = $obj->getUserSelectedRole($_GET['userid']);
	$selectedOffice = $obj->getUserSelectedOffice($_GET['userid']);


}
if(isset($_GET['delid']))
{
	$obj->deleteUser($_GET['delid']);
}

if(isset($_POST['submit']))
{		

	if(isset($_GET['userid']))
	{
		$success = $obj->updateUser($_POST,$_GET['userid']);
		if($success==true)
		{
		$_SESSION['alert'] = "User Updated Successfully!";
		}
		else
		{
			$_SESSION['alert1'] = "Username and Password is incorrect";
		}
		
	}
	else
	{
		$save = $obj->saveUser($_POST);
		if ($save===true) {
            $_SESSION['alert'] = '<b>Success!</b> User saved successfully.';
        } 
        if ($save===false) {
            $_SESSION['alert1'] = '<b>False!</b> User Already Exist.';
        } 
		
	}
header("Location:adduser.php");
	// $success = $obj->addUserByAdmin($_POST['username'],$_POST['email'],$_POST['password'],$_POST['like']);
	
	// header('location:adduser.php');

	// if($success)
	// {
	// 	$_SESSION['alert'] = "User Registered Successfully!";
	// }
	
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
		
		

		<h2>Add User</h2>
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
				
					
					
					<div class="panel-body">
						
						<form role="form" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
							
							
							<div class="form-group">
							
								<label for="field-1" class="col-sm-2 control-label">First Name</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="First Name" name="fname" value="<?php echo isset($singleUser['fname'])?$singleUser['fname']:""?>" required>
								</div>
								<label for="field-1" class="col-sm-2 control-label">Middle Name</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Middle Name" name="mname" value="<?php echo isset($singleUser['mname'])?$singleUser['mname']:""?>" required>
								</div>
							</div>
							<div class="form-group">
							
								<label for="field-1" class="col-sm-2 control-label">Last Name</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Last Name" name="lname" value="<?php echo isset($singleUser['lname'])?$singleUser['lname']:""?>" required>
								</div>

								<label for="field-1" class="col-sm-2 control-label">Age Group</label>
								
								<div class="col-md-3 col-sm-6">
									<select name="age" class="form-control">
										<option>Select Age</option>
										<option value="1" <?php if(isset($singleUser['age'])){if($singleUser['age']=='1'){echo 'selected';}}?>>18-30</option>
										<option value="2" <?php if(isset($singleUser['age'])){if($singleUser['age']=='2'){echo 'selected';}}?>>30+</option>
									</select>
								</div>

							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Gender</label>
								
								<div class="col-md-3 col-sm-6">
									<select name="gender" class="form-control">
										<option>Select Gender</option>
										<option value="male" <?php if(isset($singleUser['gender'])){if($singleUser['gender']=='male'){echo 'selected';}}?>>Male</option>
										<option value="female" <?php if(isset($singleUser['gender'])){if($singleUser['gender']=='female'){echo 'selected';}}?>>Female</option>
									</select>
								</div>
								<label for="field-1" class="col-sm-2 control-label">Occupation</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Occupation" name="occupation" value="<?php echo isset($singleUser['occupation'])?$singleUser['occupation']:""?>" required>
								</div>
							</div>
							<div class="form-group">
								
								<label for="field-1" class="col-sm-2 control-label">Email</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Email" name="email" value="<?php echo isset($singleUser['email'])?$singleUser['email']:""?>" required>
								</div>
								<label for="field-1" class="col-sm-2 control-label">Password</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="password" class="form-control" id="field-1" placeholder="*********" name="password" value="<?php echo isset($singleUser['password'])?$singleUser['password']:""?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								</div>
							</div>	
						
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">Country</label>
	
								<div class="col-md-3 col-sm-6">
									<select class="form-control" id="countryid" name="country" onchange="myFunction()">
										<option value="">Select Country</option>
										 <?php for($i=0; $i<count($countries); $i++){ 
              
              $selected = '';

          
                if($countries[$i]['country_id'] == $selectedCountry['user_country']){

                     $selected = 'selected';                    

                }
                if($countries[$i]['country_id'] == $officeinfo['office_country']){

                     $selected = 'selected';                    

                }

            ?>

            <option <?php echo $selected;?> value="<?php echo $countries[$i]['country_id'];?>"><?php echo $countries[$i]['country'];?></option>

          <?php } ?>
									</select>
								</div>
								<label for="field-1" class="col-sm-2 control-label">City</label>
								
								<div class="col-md-3 col-sm-6" id="dynamiccitydiv">
									<select class="form-control" name="city" id="cityid" onchange="myFunction1()">
										<option value="">Select City</option>
										 <?php for($i=0; $i<count($cities); $i++){ 
              
              $selected = '';

          
                if($cities[$i]['city_id'] == $selectedCity['user_city']){

                     $selected = 'selected';                    

                }
                if($cities[$i]['city_id'] == $officeinfo['office_city']){

                     $selected = 'selected';                    

                }

            ?>

            <option <?php echo $selected;?> value="<?php echo $cities[$i]['city_id'];?>"><?php echo $cities[$i]['city'];?></option>

          <?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">

								<label for="field-1" class="col-sm-2 control-label">Branch</label>
	
								<div class="col-md-3 col-sm-6" id="dynamicofficediv">
									<select class="form-control" name="officeid">
										<option value="">Select Branch</option>
										 <?php for($i=0; $i<count($offices); $i++){ 
              
              $selected = '';

          
                if($offices[$i]['office_id'] == $selectedOffice['office_id']){

                     $selected = 'selected';                    

                }

            ?>

            <option <?php echo $selected;?> value="<?php echo $offices[$i]['office_id'];?>"><?php echo $offices[$i]['office_name'];?></option>

          <?php } ?>
									</select>
								</div>
							<label for="field-1" class="col-sm-2 control-label">User Role</label>
	
								<div class="col-md-3 col-sm-6">
									<select class="form-control" name="role">
										<option value="">Select Role</option>
										 <?php for($i=0; $i<count($roles); $i++){ 
              
              $selected = '';

          
                if($roles[$i]['role_id'] == $selectedRole['user_role']){

                     $selected = 'selected';                    

                }

            ?>

            <option <?php echo $selected;?> value="<?php echo $roles[$i]['role_id'];?>"><?php echo $roles[$i]['role'];?></option>

          <?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								

				<label for="field-1" class="col-sm-2 control-label">Phone</label>
								
								<div class="col-md-3 col-sm-6">
									<input type="text" class="form-control" id="field-1" placeholder="Phone" name="phone" value="<?php echo isset($singleUser['user_phone'])?$singleUser['user_phone']:""?>" required>
								</div>				
								
							</div>

							

								<div class="form-group">
									<label for="field-1" class="col-sm-2 control-label"></label>
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

function myFunction()
{   
	var countryid = $('#countryid').val();
	            
                $.ajax({ 
                    url: 'adduser.php?countryid='+countryid,
                    type: 'GET',
                    success: function (result) {
                       $('#dynamiccitydiv').html(result);
                    }
                });
        
}

function myFunction1()
{   
	var cityid = $('#cityid').val();
	
	   $.ajax({ 
	        url: 'adduser.php?cityid='+cityid,
	        type: 'GET',
	        success: function (result) {
	        	
	           $('#dynamicofficediv').html(result);
	        }
	    });
        
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