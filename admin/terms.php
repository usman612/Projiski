<?php
ob_start();
session_start();
require '../classes/term.php';
$obj= new Term;
$termtext = $obj->getTermText();
if(isset($_POST['submit']))
{
	if(empty($termtext))
	{
	$obj->saveTerm($_POST['termtext']);
	}
	else
	{
		
		$obj->updateTerm($_POST['termtext']);
	}
	header("Location:terms.php");
}
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
	<title>Booking | T&C</title>
	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<script src="assets/js/jquery-1.11.3.min.js"></script>
</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php include('header.php');?>
					
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
		
		<br />
		<h2>Terms & Conditions</h2>
		<br />
		
		<form role="form" method="post">
			<textarea class="form-control ckeditor" name="termtext">
				<?php if(!empty($termtext)){echo $termtext['termtext'];}?>
			</textarea><br>
			<input type="submit" name="submit" value="Save" class="btn btn-md btn-info" style="width:200px;">
		</form>
		
		
		
		




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/wysihtml5/bootstrap-wysihtml5.css">
	<link rel="stylesheet" href="assets/js/codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="assets/js/uikit/css/uikit.min.css">
	<link rel="stylesheet" href="assets/js/uikit/addons/css/markdownarea.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="assets/js/ckeditor/ckeditor.js"></script>
	<script src="assets/js/ckeditor/adapters/jquery.js"></script>
	<script src="assets/js/uikit/js/uikit.min.js"></script>
	<script src="assets/js/codemirror/lib/codemirror.js"></script>
	<script src="assets/js/marked.js"></script>
	<script src="assets/js/uikit/addons/js/markdownarea.min.js"></script>
	<script src="assets/js/codemirror/mode/markdown/markdown.js"></script>
	<script src="assets/js/codemirror/addon/mode/overlay.js"></script>
	<script src="assets/js/codemirror/mode/xml/xml.js"></script>
	<script src="assets/js/codemirror/mode/gfm/gfm.js"></script>
	<script src="assets/js/icheck/icheck.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>