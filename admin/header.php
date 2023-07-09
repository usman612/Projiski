<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="assets/images/favicon.ico">

	<title>HireIrish | <?php echo $title;?></title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/wickedpicker.css">
  	<script src="assets/js/jquery-1.11.3.min.js"></script>
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
 
 

	<style type="text/css">
	table th,td{
		text-align: center;
	}
	</style>


</head>
<body class="page-body" data-url="">

<div class="page-container">
<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="index.php">
						<h2 style="color:#fff;margin:0;">Projiski</h2>
						<!-- <img src="../images/waddani_logo.png" width="150"> -->
						<!-- <img src="../images/<?php echo $singlelogo['logo'];?>" width="120" alt="" style="height:56px;"/> -->
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				
				<li class="active opened active ">
					<a href="index.php">
						<i class="entypo-home"></i>
						<span class="title">Home</span>
					</a>
					
				</li>
				<li class="active opened active ">
					<a href="viewusers.php">
						<i class="entypo-users"></i>
						<span class="title">View Users</span>
					</a>
					
				</li>
				<li class="has-sub active">
					<a href="layout-api.html">
						<i class="entypo-book"></i>
						<span class="title">Projects</span>
					</a>
				<ul>	
				
					 
				<li class="active opened active ">
					<a href="viewprojects.php">
						<i class="entypo-plus"></i>
						<span class="title">View Project</span>
					</a>
					
				</li>	
				</ul>
				</li>	
						
						
					</ul>
			
		</div>

	</div>
