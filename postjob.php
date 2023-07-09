<?php
ob_start();
session_start();
require'classes/project.php';
$obj = new Project;
$title = 'Add Project';
if(!isset($_SESSION['login']))
{
  header('location:login.php');
}


if(isset($_POST['stripeToken']))
{

    $key = "sk_test_51Hp7kAIcU2oWsQiGRvOgLgG3Kb6cDfGAg1w6CNUIPPOcJe6ymYTp6qRMy4aE2fPDipf1l0xRhR57j1rMqYn22cwD0006f0P48Y";

    require 'vendor/autoload.php';
     \Stripe\Stripe::setApiKey($key);

  $stripe = new \Stripe\StripeClient($key);

$charge = $stripe->charges->create([
  'amount' => $_POST['budget'] * 100,
  'currency' => 'usd',
  'source' => $_POST['stripeToken'],
  'description' => 'Project payment',
]);

$charge_id = $charge->id;
    
    if(!empty($_FILES['image']['name']))
    {
    
            $add = explode(".", $_FILES['image']['name']); 
            $name = time();
            if (move_uploaded_file($_FILES['image']['tmp_name'], 'projects/project' . $name . "." . $add[1])) {

            } else {
                echo "Failed to upload file Contact Site admin to fix the problem";
            }

            $imgName = 'project' . $name . "." . $add[1]; 
    }
    else{
        $imgName = '';
        }

        $success = $obj->saveProject($_POST,$imgName,$_SESSION['userid'],$charge_id);
        if($success==true)
        {
            echo "<script>alert('project submitted successfully')
    window.location='clients_project.php';
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
<style type="text/css">
    .btn-success{
        background-color: #197B30 !important;
    }
    .btn-info{
        background-color: #197B30 !important;
    }
    </style>
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
                    <div class="post-a-project">
                        <h1 class="title_block"><span>Post</span> a project</h1>
                        <div class="box clearfix">
                            <div class="box-content">
                                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data" id="payment-form">
                                    <div class="form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-step">
                                            <label>What type of work do you require?</label>
                                            <select id="selectCategories" class="form-control" name="workcategory" required>
                                                <option value="" selected="selected">Select a category of work</option>
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
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>What is your project about?</label>
                                            <input class="form-control" id="textProject" name="projectabout" placeholder="Eg: Design a website" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Description your project</label>
                                            <textarea class="form-control" rows="10" id="description" name="description" placeholder="Type something about your project..." required></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-step">
                                            <label>Budget</label>
                                            <input class="form-control" id="textBudget" name="budget" placeholder="Eg: $229.00" type="text" required>
                                        </div>
                                       
                                    </div>
                                     <input type="hidden" id="pubkey" value="pk_test_51Hp7kAIcU2oWsQiG5FXKsU3qOz08EMMvy4dDYpiVxtOXEiN8V9LI54dZ33Jdfk1yW64cM9cZyfR0UNU5oAATdxe2000R9gnT7D">
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-step">
                                            <label>Upload Document File(optional)</label>
                                            <input type="file" name="image" class="form-control"    value="fileupload" required>
                                        </div>
                                       
                                    </div>

                                     <div class="card-header stripe-method">
                                 
                            </div>
                            <label>Payment Details</label>
                            <div class="card-body stripe-method">
                                <div id="card-element" style="background:#fff;padding:10px;">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            
                            </div>
                            <br><br>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-left">
                                           <p>By clicking 'Post Project', you are indicating that you have read and agree to the <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a> and <a href="#" title="Privacy Policy">Privacy Policy</a></p>
                                        </div> 
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
                                           <button type="submit" name="btnsubmit" class="btn button btn-primary btn-shadown">Submit your message</button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- end post-a-project -->
                </div><!-- end container -->
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end warp-->

        <!-- footer-->
        <?php include('footer.php');?>
        
        <!-- backtop -->
        <div class="go-up" style="display: none;">
            <a href="#"><i class="fa fa-chevron-up"></i></a>    
        </div><!-- end backtop -->
    </div><div id="off-mainmenu"><div class="off-mainnav"><div class="close-menu"><i class="fa fa-close"></i></div><nav id="main-nav">
                        <ul class="nav navbar-nav megamenu">
                            <li>
                                <a href="Seller.html">Seller</a>
                            </li>
                            <li><a href="Jobs.html">Jobs</a></li>
            
                            <li><a href="support.html">Support</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </nav></div></div> <!-- end all -->

    <!--js fils-->
    
    <script src="assets/jquery-1.js"></script>
    <script src="assets/bootstrap.js"></script>
    <script src="assets/custom.js"></script>

    <script src="assets/tmpl.js"></script>
    <script src="assets/jquery.js"></script>
    <script src="assets/draggable-0.js"></script>
    <script src="assets/jquery_002.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    
<!-- Stripe JS -->

   
    <!-- MAP & CONTACT -->

    <script type="text/javascript">
$(document).ready(function(){       
var pubkey = document.getElementById('pubkey').value;
var stripe = Stripe(pubkey);
var elements = stripe.elements();
// Custom Styling
var style = {
    base: {
        color: '#32325d',
        lineHeight: '24px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
// Create an instance of the card Element
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            stripeTokenHandler(result.token);
        }
    });
});
// Send Stripe Token to Server
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
// Add Stripe Token to hidden input
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
// Submit form
    form.submit();
}
}) 
    </script>

</body></html>