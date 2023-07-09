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
    
 $success = $obj->updateProfile($_POST,$_SESSION['userid']);
 if($success==true)
 {
   echo "<script>alert('profile updated successfully')
    window.location='viewprofile.php';
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
    <style>
        body { margin: 0; padding: 0; border: 0; min-width: 320px; color: #777; }
       
        p, td { line-height: 1.5; }
        ul { padding: 0 0 0 20px; }

       .block-search ul{
        min-height: 30px;
        background: #eee;
       }
       .tag-editor li{
        margin: 13px 0 !important;
       }

        @media (max-width:480px) {
            h1 { font-size: 3em; }
            h2 { font-size: 1.8em; }
            h3 { font-size: 1.5em; }
            td:first-child { white-space: normal; }
        }

        .inline-code { padding: 1px 5px; background: #fff; border-radius: 2px; }
        pre { padding: 15px 10px; font-size: .9em; color: #555; background: #fff; }
        pre i { color: #aaa; } /* comments */
        pre b { font-weight: normal; color: #cf4b25; } /* strings */
        pre em { color: #0c59e9; } /* numeric */

        /* Pure CSS */
        .pure-button { margin: 5px 0; text-decoration: none !important; }
        .button-lg { margin: 5px 0; padding: .65em 1.6em; font-size: 105%; }
        .button-sm { font-size: 85%; }

        
       

        #response {
            margin: 0 0 1.2em; padding: 10px; background: #f3f3f3; color: #777;
            font-size: .9em; max-height: 150px; overflow: hidden; overflow-y: auto;
        }
        #response i { font-style: normal; color: #cf4b25; }
        #response hr { margin: 2px 0; border: 0; border-top: 1px solid #eee; border-bottom: 1px solid #fdfdfd; }

        /* overwrite default CSS for tiny, dark tags in demo5 */
        #demo5+.tag-editor { background: #fafafa; font-size: 12px; }
        #demo5+.tag-editor .tag-editor-tag { color: #fff; background: #555; border-radius: 2px; }
        #demo5+.tag-editor .tag-editor-spacer { width: 7px; }
        #demo5+.tag-editor .tag-editor-delete { display: none; }

        /* color tags */
        .tag-editor .red-tag .tag-editor-tag { color: #c65353; background: #ffd7d7; }
        .tag-editor .red-tag .tag-editor-delete { background-color: #ffd7d7; }
        .tag-editor .green-tag .tag-editor-tag { color: #45872c; background: #e1f3da; }
        .tag-editor .green-tag .tag-editor-delete { background-color: #e1f3da; }
    </style>
    <link rel="stylesheet" href="jquery.tag-editor.css">
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
    <div id="targetLayer"></div>
    <img src="photo.png"  class="icon-choose-image" />
    <p style="padding-top:50px;" id="choose-text"><b>Choose Image</b></p>
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
                                     <h4>Personal*</h4>
                                        <hr> 
                                        <div class="col-md-12">   
                                        <div class="form-group">
                                        
                                        <div class="col-lg-6">
                                            <label for="passwd">Position</label>
                                            <select class="form-control" name="position">
                                                <option value="Junior Developer">Junior Developer</option>
                                                 <option value="Senior Developer">Senior Developer</option>
                                                  <option value="Junior Designer">Junior Designer</option>
                                                  <option value="Senior Designer">Senior Designer</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="passwd">Category</label>
                                             <select id="selectCategories" class="form-control" name="category" required>
                                        <option selected="selected" value="">Categories</option>
                                        <option value="1">Websites IT &amp; Software</option>
                                        <option value="2">Mobile</option>
                                        <option value="3">Writing</option>
                                        <option value="4">Design</option>
                                        <option value="5">Data Entry</option>
                                        <option value="6">Product Sourcing &amp; Manufacturing</option>
                                        <option value="7">Sales &amp; Marketing</option>
                                        <option value="8">Business, Accounting &amp; Legal</option>
                                        <option value="9">Local Jobs &amp; Services</option>
                                    </select>
                                        </div>
                                    </div>
                                    </div>
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
                                            <label for="passwd">Skills</label>
                                            <input id="hero-demo" class="form-control"  name="skills" type="text" placeholder="HTML,CSS"  value="<?php if(!empty($personal['skills'])){echo $personal['skills'];}?>">
                                        </div>



                                    </div>
                                    </div>

                                    <div class="col-md-12">   
                                        <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="email">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="male" <?php if(!empty($personal['gender'])){if($personal['gender']=='male'){echo 'selected';}}?>>Male</option>
                                                <option value="female" <?php if(!empty($personal['gender'])){if($personal['gender']=='female'){echo 'selected';}}?>>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="email">County</label>
                                             <select class="form-control" name="county">
                                                <option value="Antrim" <?php if($personal['county']=='Antrim'){echo 'selected';}?>>Antrim</option>
                                                <option value="Armagh" <?php if($personal['county']=='Armagh'){echo 'selected';}?>>Armagh</option>
                                                <option value="Carlow" <?php if($personal['county']=='Carlow'){echo 'selected';}?>>Carlow</option>
                                                <option value="Cavan" <?php if($personal['county']=='Cavan'){echo 'selected';}?>>Cavan</option>
                                                <option value="Clare" <?php if($personal['county']=='Clare'){echo 'selected';}?>>Clare</option>
                                                <option value="Cork" <?php if($personal['county']=='Cork'){echo 'selected';}?>>Cork</option>
                                                <option value="Derry" <?php if($personal['county']=='Derry'){echo 'selected';}?>>Derry</option>
                                                <option value="Donegal" <?php if($personal['county']=='Donegal'){echo 'selected';}?>>Donegal</option>
                                                <option value="Down" <?php if($personal['county']=='Down'){echo 'selected';}?>>Down</option>
                                                <option value="Dublin" <?php if($personal['county']=='Dublin'){echo 'selected';}?>>Dublin</option>
                                                <option value="Fermanagh" <?php if($personal['county']=='Fermanagh'){echo 'selected';}?>>Fermanagh</option>
                                                <option value="Galway" <?php if($personal['county']=='Galway'){echo 'selected';}?>>Galway</option>
                                                <option value="Kerry" <?php if($personal['county']=='Kerry'){echo 'selected';}?>>Kerry</option>
                                                <option value="Kildare" <?php if($personal['county']=='Kildare'){echo 'selected';}?>>Kildare</option>
                                                <option value="Kilkenny" <?php if($personal['county']=='Kilkenny'){echo 'selected';}?>>Kilkenny</option>
                                                <option value="Laois" <?php if($personal['county']=='Laois'){echo 'selected';}?>>Laois</option>
                                                <option value="Leitrim" <?php if($personal['county']=='Leitrim'){echo 'selected';}?>>Leitrim</option>
                                                <option value="Limerick" <?php if($personal['county']=='Limerick'){echo 'selected';}?>>Limerick</option>
                                                <option value="Longford" <?php if($personal['county']=='Longford'){echo 'selected';}?>>Longford</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    </div>



                                    <div class="col-md-12">   
                                        <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="email">Address</label>
                                            <textarea class="form-control" placeholder="Address" name="address"><?php if(!empty($personal['address'])){echo $personal['address'];}?></textarea>
                                        </div>
                                   
                                        <div class="col-lg-6">
                                            <label for="passwd">Introduction</label>
                                             <textarea class="form-control" placeholder="Introduction" name="introduction"><?php if(!empty($personal['introduction'])){echo $personal['introduction'];}?></textarea>
                                        </div>
                                    </div>
                                    </div>

                                  <h4>Qualification*</h4>
        <hr>
    <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Qualification Title</th>
                                    <th>Year Started</th>
                                    <th>Year End</th>
                                    <th>Grade</th>
                                    <th>Aditionar</th>
                                </tr>
                            </thead>
                            <tbody class="tbodyClone">
                            
                                <tr id="clonedInput1" class="clonedInput">
                                    <td><input id="nm_0" name="qualification_title[]" required type="text" class="form-control" placeholder="Title" value=""/></td>
                                    <td><input id="cpf_0" name="year_started[]" required type="text" class="form-control" placeholder="Year Started" value="" /></td>
                                    <td><input id="cnh_0" name="year_ended[]" required type="text" class="form-control" placeholder="Year Ended" value="" /></td>
                                    <td><input id="passport_0" name="grade[]" required type="text" class="form-control" placeholder="Grade" value="" /></td>
                                    <td>
                                        <button id="btnAdd_0" name="btnAdd_0" type="button" class="clone btn btn-success"><i class="fa fa-plus-circle">+</i></button>
                                        <button id="btnDel_0" name="btnDel_0" type="button" class="remove btn btn-danger"><i class="fa fa-trash-o"></i>-</button>
                                    </td>
                                </tr>
                           
                            </tbody>
                        </table>

                    </div>                                        
                </div> 

                                <h4>Experience*</h4>
        <hr>
    <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Post Title</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Your responsibilities in this Compnay</th>
                                    <th>Aditionar</th>
                                </tr>
                            </thead>
                            <tbody class="tbodyClone2">
                             
                                <tr id="clonedInput2" class="clonedInput2">
                                    <td><input id="nm_1" name="company_name[]" required type="text" class="form-control" placeholder="Company" value="" /></td>
                                    <td><input id="rg_1" name="post_title[]" required type="text" class="form-control" placeholder="Position" value="" /></td>
                                    <td><input id="cpf_1" name="start_date[]" required type="date" class="form-control" placeholder="Starting Date" value="" /></td>
                                    <td><input id="cnh_1" name="end_date[]" required type="date" class="form-control" placeholder="Ending Date" value="" /></td>
                                    <td><input id="passport_1" name="responsibility[]" required type="text" class="form-control" placeholder="Responsibilities" value="" /></td>
                                    <td>
                                        <button id="btnAdd_1" name="btnAdd_1" type="button" class="clone2 btn btn-success"><i class="fa fa-plus-circle">+</i></button>
                                        <button id="btnDel_1" name="btnDel_1" type="button" class="remove2 btn btn-danger"><i class="fa fa-trash-o"></i>-</button>
                                    </td>
                                </tr>
                             
                            </tbody>
                        </table>

                    </div>                                        
                </div> 

                <h4>Bank Detail*</h4>
                 <hr>
                 <div class="col-md-12">   
                <div class="form-group">
                <div class="col-lg-4">
                    <label for="passwd">Bank Name</label>
                    <input class="form-control" id="passwd" name="bank_name" type="text" placeholder="Bank Name" value="<?php if(!empty($personal['bank_name'])){echo $personal['bank_name'];}?>">
                </div>
                <div class="col-lg-4">
                    <label for="passwd">Account Title</label>
                    <input class="form-control" id="passwd" name="acc_title" type="text" placeholder="Account Title" value="<?php if(!empty($personal['account_title'])){echo $personal['account_title'];}?>">
                </div>
                <div class="col-lg-4">
                    <label for="passwd">Account No</label>
                    <input class="form-control" id="passwd" name="account_no" type="text" placeholder="Account No" value="<?php if(!empty($personal['accountno'])){echo $personal['accountno'];}?>">
                </div>
                </div>
                </div>
                <div class="col-md-12">   
                <div class="form-group">
                <div class="col-lg-4">
                    <label for="passwd">Branch Code</label>
                    <input class="form-control" id="passwd" name="branchcode" type="text" placeholder="Branch Code" value="<?php if(!empty($personal['branchcode'])){echo $personal['branchcode'];}?>">
                </div>
                <div class="col-lg-4">
                    <label for="passwd">BIC</label>
                    <input class="form-control" id="passwd" name="bic" type="text" placeholder="Bic" value="<?php if(!empty($personal['bic'])){echo $personal['bic'];}?>">
                </div>
                <div class="col-lg-4">
                    <label for="passwd">IBAN</label>
                    <input class="form-control" id="passwd" name="iban" type="text" placeholder="Iban" value="<?php if(!empty($personal['iban'])){echo $personal['iban'];}?>">
                </div>
                </div>
                </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button type="submit" name="submit" class="btn button btn-default"><i class="fa fa-lock left"></i> Update</button>
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
    </div></div> <!-- end all -->

                   

    <!--js fils-->
    <script src="assets/jquery-1.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/custom.js"></script>

    <script src="assets/tmpl.js"></script>
    <script src="assets/jquery.js"></script>
    <script src="assets/draggable-0.js"></script>
    <script src="assets/jquery_002.js"></script>
     <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    <script src="jquery.caret.min.js"></script>
    <script src="jquery.tag-editor.js"></script>
    <script>
        // jQuery UI autocomplete extension - suggest labels may contain HTML tags
        // github.com/scottgonzalez/jquery-ui-extensions/blob/master/src/autocomplete/jquery.ui.autocomplete.html.js
        (function($){var proto=$.ui.autocomplete.prototype,initSource=proto._initSource;function filter(array,term){var matcher=new RegExp($.ui.autocomplete.escapeRegex(term),"i");return $.grep(array,function(value){return matcher.test($("<div>").html(value.label||value.value||value).text());});}$.extend(proto,{_initSource:function(){if(this.options.html&&$.isArray(this.options.source)){this.source=function(request,response){response(filter(this.options.source,request.term));};}else{initSource.call(this);}},_renderItem:function(ul,item){return $("<li></li>").data("item.autocomplete",item).append($("<a></a>")[this.options.html?"html":"text"](item.label)).appendTo(ul);}});})(jQuery);

        var cache = {};
        function googleSuggest(request, response) {
            var term = request.term;
            if (term in cache) { response(cache[term]); return; }
            $.ajax({
                url: 'https://query.yahooapis.com/v1/public/yql',
                dataType: 'JSONP',
                data: { format: 'json', q: 'select * from xml where url="http://google.com/complete/search?output=toolbar&q='+term+'"' },
                success: function(data) {
                    var suggestions = [];
                    try { var results = data.query.results.toplevel.CompleteSuggestion; } catch(e) { var results = []; }
                    $.each(results, function() {
                        try {
                            var s = this.suggestion.data.toLowerCase();
                            suggestions.push({label: s.replace(term, '<b>'+term+'</b>'), value: s});
                        } catch(e){}
                    });
                    cache[term] = suggestions;
                    response(suggestions);
                }
            });
        }

        $(function() {
            $('#hero-demo').tagEditor({
                placeholder: 'Enter tags ...',
                autocomplete: { source: googleSuggest, minLength: 3, delay: 250, html: true, position: { collision: 'flip' } }
            });

            $('#demo1').tagEditor({ initialTags: ['Hello', 'World', 'Example', 'Tags'], delimiter: ', ', placeholder: 'Enter tags ...' }).css('display', 'block').attr('readonly', true);

            $('#demo2').tagEditor({
                autocomplete: { delay: 0, position: { collision: 'flip' }, source: ['ActionScript', 'AppleScript', 'Asp', 'BASIC', 'C', 'C++', 'CSS', 'Clojure', 'COBOL', 'ColdFusion', 'Erlang', 'Fortran', 'Groovy', 'Haskell', 'HTML', 'Java', 'JavaScript', 'Lisp', 'Perl', 'PHP', 'Python', 'Ruby', 'Scala', 'Scheme'] },
                forceLowercase: false,
                placeholder: 'Programming languages ...'
            });

            $('#demo3').tagEditor({ initialTags: ['Hello', 'World'], placeholder: 'Enter tags ...' });
            $('#remove_all_tags').click(function() {
                var tags = $('#demo3').tagEditor('getTags')[0].tags;
                for (i=0;i<tags.length;i++){ $('#demo3').tagEditor('removeTag', tags[i]); }
            });

            $('#demo4').tagEditor({
                initialTags: ['Hello', 'World'],
                placeholder: 'Enter tags ...',
                onChange: function(field, editor, tags) { $('#response').prepend('Tags changed to: <i>'+(tags.length ? tags.join(', ') : '----')+'</i><hr>'); },
                beforeTagSave: function(field, editor, tags, tag, val) { $('#response').prepend('Tag <i>'+val+'</i> saved'+(tag ? ' over <i>'+tag+'</i>' : '')+'.<hr>'); },
                beforeTagDelete: function(field, editor, tags, val) {
                    var q = confirm('Remove tag "'+val+'"?');
                    if (q) $('#response').prepend('Tag <i>'+val+'</i> deleted.<hr>');
                    else $('#response').prepend('Removal of <i>'+val+'</i> discarded.<hr>');
                    return q;
                }
            });

            $('#demo5').tagEditor({ clickDelete: true, initialTags: ['custom style', 'dark tags', 'delete on click', 'no delete icon', 'hello', 'world'], placeholder: 'Enter tags ...' });

            function tag_classes(field, editor, tags) {
                $('li', editor).each(function(){
                    var li = $(this);
                    if (li.find('.tag-editor-tag').html() == 'red') li.addClass('red-tag');
                    else if (li.find('.tag-editor-tag').html() == 'green') li.addClass('green-tag')
                    else li.removeClass('red-tag green-tag');
                });
            }
            $('#demo6').tagEditor({ initialTags: ['custom', 'class', 'red', 'green', 'demo'], onChange: tag_classes });
            tag_classes(null, $('#demo6').tagEditor('getTags')[0].editor); // or editor == $('#demo6').next()
        });

        if (~window.location.href.indexOf('http')) {
            (function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
            (function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=114593902037957";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
            $('#github_social').html('\
                <iframe style="float:left;margin-right:15px" src="//ghbtns.com/github-btn.html?user=Pixabay&repo=jQuery-tagEditor&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>\
                <iframe style="float:left;margin-right:15px" src="//ghbtns.com/github-btn.html?user=Pixabay&repo=jQuery-tagEditor&type=fork&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>\
            ');
        }
    </script>
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