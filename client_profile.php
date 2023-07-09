<?php
session_start();
require 'classes/user.php';
$obj = new User;
if(!isset($_SESSION['login']))
{
    header("Location:login.php");
}
$personal = $obj->getUserPersonalData($_SESSION['userid']);
$qualification = $obj->getUserQualification($_SESSION['userid']);
if(!empty($qualification))
{
    header("Location:editprofile.php");
}
$experience = $obj->getUserExperience($_SESSION['userid']);

if(isset($_POST['submit']))
{
    
 $success = $obj->updateClientProfile($_POST,$_SESSION['userid']);
 if($success==true)
 {
   echo "<script>alert('profile updated successfully')
    window.location='viewclientprofile.php';
   </script>";
 }
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
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <style type="text/css">
    .page #columns .warpper {
    padding: 50px 0 300px;
}
.panel-default{
    border-color:#f7f7f7 !important;
    
}
#targetOuter{   
    position:relative;
    text-align: center;
    background-color: darkgrey;
    margin: 20px auto;
    width: 200px;
    height: 200px;
    border-radius: 4px;
}
.btnSubmit {
    background-color: #565656;
    border-radius: 4px;
    padding: 10px;
    border: #333 1px solid;
    color: #FFFFFF;
    width: 200px;
    cursor:pointer;
}
.inputFile {
    padding: 5px 0px;
    margin-top:8px; 
    background-color: #FFFFFF;
    width: 48px;    
    overflow: hidden;
    opacity: 0; 
    cursor:pointer;
}
.icon-choose-image {
    position: absolute;
    opacity: 0.1;
    top: 50%;
    left: 50%;
    margin-top: -24px;
    margin-left: -24px;
    width: 48px;
    height: 48px;
}
.box{
    margin-bottom: 0px !important;
    -webkit-box-shadow:none !important; 
}
.upload-preview {border-radius:4px;}
#body-overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
#body-overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
    </style>
    <script type="text/javascript">
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
            $('.btnSubmit').attr('disabled',false);
            $('#choose-text').hide();
            $("#targetLayer").css('opacity','0.7');
            $(".icon-choose-image").css('opacity','0.5');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}

$(document).ready(function (e) {
    var imgsrc = $('#targetLayer').html();
    if(imgsrc=='')
    {
        $('.btnSubmit').attr('disabled',true);
    }
    $("#uploadForm").on('submit',(function(e) {
        
       var imgsrc = $('#targetLayer').html();
        if(imgsrc=='')
        {
            alert('Please choose an image Then Upload');
        }
        else
        {
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data:  new FormData(this),
            beforeSend: function(){$("#body-overlay").show();},
            contentType: false,
            processData:false,
            success: function(data)
            {
            $("#targetLayer").html(data);
            $("#targetLayer").css('opacity','1');
            setInterval(function() {$("#body-overlay").hide(); },500);
            alert('uploaded successfully');
            },
            error: function() 
            {
            }           
       });
   }
    }));

});
</script>
</head>
<body class="page">
    <div id="all">
        <!-- header -->
        <?php include('header.php');?>

        <div id="columns" class="columns-container">
            <div class="bg-top"></div>
            <div class="warpper">
                <!-- container -->
                <div class="container">
                    <div class="row">
                          <?php if(isset($_SESSION['error'])):?>
                        <?php echo $_SESSION['error'];?>
                    <?php else:?>
                    <?php endif;?>
                       
                        <div class="col-lg-12">

                            <div id="body-overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div>
                                  <center>
       <form id="uploadForm" action="upload.php" method="post" class="form-horizontal box panel panel-default">
        <h3 class="panel-heading" style="text-align:left;">Complete Your Profile</h3>
<div id="targetOuter">
    <div id="targetLayer">
        <?php if(!empty($personal['image'])):?>
        <img src="images/<?php echo $personal['image']; ?>" width="200px" height="200px" class="upload-preview" />
        <?php else:?>
    <?php endif;?>
    </div>
    <img src="photo.png"  class="icon-choose-image" />
    <?php if(empty($personal['image'])):?>
    <p style="padding-top:50px;" id="choose-text"><b>Choose Image</b></p>
<?php else:?>
<?php endif;?>
    <div class="icon-choose-image" >
    <input name="userImage" id="userImage" type="file" class="inputFile" onChange="showPreview(this);" />
    </div>
</div>
<div>
<input type="submit" value="Upload Photo" class="btnSubmit" />
</form>
        </center>
                            <form action="" id="form-login" class="form-horizontal box panel panel-default" method="POST">
                                
                                <div class="span3">
       
    </div>
                                <div class="form_content panel-body clearfix">
                                     
                                        <hr> 
                                     
                                        <div class="col-md-12">   
                                        <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="email">First Name</label>
                                            <input class="form-control" id="email" name="fname" type="text" placeholder="First Name" value="<?php if(!empty($personal['fname'])){echo $personal['fname'];}?>">
                                        </div>
                                   
                                        <div class="col-lg-6">
                                            <label for="passwd">Last Name</label>
                                            <input class="form-control" id="passwd" name="lname" type="text" placeholder="Last Name" value="<?php if(!empty($personal['lname'])){echo $personal['lname'];}?>">
                                        </div>
                                    </div>
                                    </div>

                                     <div class="col-md-12"> 
                                     <div class="form-group">  
                                        <div class="col-lg-6">
                                            <label for="passwd">Phone</label>
                                            <input class="form-control" id="passwd" name="phone" type="text" placeholder="phone" value="<?php if(!empty($personal['phone'])){echo $personal['phone'];}?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="male" <?php if(!empty($personal['gender'])){if($personal['gender']=='male'){echo 'selected';}}?>>Male</option>
                                                <option value="female" <?php if(!empty($personal['gender'])){if($personal['gender']=='female'){echo 'selected';}}?>>Female</option>
                                            </select>
                                        </div>



                                    </div>
                                    </div>

                                    <div class="col-md-12">   
                                        <div class="form-group">
                                        
                                        <div class="col-lg-6">
                                            <label for="email">County</label>
                                            <select class="form-control" name="county">
                                                <option value="first">first</option>
                                                <option value="second">second</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address" value="<?php if(!empty($personal['address'])){echo $personal['address'];}?>">
                                        </div>
                                        
                                    </div>
                                    </div>



                                    <div class="col-md-12">   
                                        <div class="form-group">
                                        
                                   
                                        <div class="col-lg-12">
                                            <label for="passwd">Introduction</label>
                                             <textarea class="form-control" placeholder="Introduction" name="introduction"><?php if(!empty($personal['introduction'])){echo $personal['introduction'];}?></textarea>
                                        </div>

                                        <div class="col-lg-12">
                                            <br>
                                            <button type="submit" name="submit" class="btn button btn-default"><i class="fa fa-lock left"></i> Update</button>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </form><!--end form -->
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
    <script type="text/javascript">
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
    var regex = /^(.*)(\d)+$/i;
    var cloneIndex = $(".clonedInput2").length;
    if ($(".clonedInput2").length == 1) {
        $('.remove2').hide();
    } else {
        $('.remove2').show();
    }

    function clone() {
        $(this).parents(".clonedInput2").clone()
            .appendTo(".tbodyClone2").find("input:text").val('')
            .attr("id", "clonedInput2" + cloneIndex)
            .find("*")
            .each(function () {
                var id = this.id || "";
                var match = id.match(regex) || [];
                if (match.length == 3) {
                    this.id = match[1] + (cloneIndex);
                }
            })
            .on('click', 'clone2', clone)
            .on('click', 'remove2', remove);

        cloneIndex++;

        //se tem só uma linha esconde o delete
        console.log("Total de linhas => " + $(".clonedInput2").length);
      
        if ($(".clonedInput2").length == 1) {
            $('.remove2').hide();
        } else {
            $('.remove2').show();
        }

    }
    function remove() {        
        $(this).parents(".clonedInput2").remove();

        if ($(".clonedInput2").length == 1) {
            $('.remove2').hide();
        } else {
            $('.remove2').show();
        }

    }    
    $(document).on("click", ".clone2", clone);
    $(document).on("click", ".remove2", remove);
    </script>

</body></html>
<?php 
$_SESSION['error'] = '';
?>