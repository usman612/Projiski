<?php
session_start();
require 'classes/user.php';
$obj = new User;
$page=1;
if(isset($_GET['page']))
{    
 $page = $_GET['page'];   
}

if(isset($_POST['search']))
{

    if(!empty($_POST['category']))
    {
        $search = $_POST['category'];
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

    
    $users = $obj->searchFreelancers($search,$skill);
   
    }
    else
    {
    $users = $obj->getAllFreelancersForNewPage($page);
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
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="assets/css.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap-theme.css">
    <link rel="stylesheet" href="assets/font-awesome.css">
    <link rel="stylesheet" href="assets/jquery.css">
    <link rel="stylesheet" href="assets/jslider.css">
    <link rel="stylesheet" href="assets/global.css">
    <link rel="stylesheet" href="assets/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="shortcut icon" href="https://pixabay.com/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300">
    <link rel="stylesheet" href="https://cdn.rawgit.com/yahoo/pure-release/v0.6.0/pure-min.css">
   <style type="text/css">
    #columns .warpper {
    position: relative;
    z-index: 3;
    padding: 30px 0 30px;
}
.btn-success{
    background-color:#197B30 !important;
}
.btn-info{
    background-color: #197B30 !important;
}
.header-heading{
    color:white;padding-left:40px;font-size:50px;
}
.button-div{
       width:220px;min-height:50px;margin-left:auto;margin-right:auto;
    }
    .header-count{
        padding-top:150px;color:yellow;padding-left:40px;font-size:50px;
    }
     .slider-div{
        width:100%;min-height:500px;background:silver;background-image:url('images/banner.png');position:relative;margin-top:-40px;background-repeat: no-repeat; background-size: 100%;background-position: center;
    }
    .footer-image{
        width:50%;min-height:400px;float:left;background-image:url('images/HireIrish-Lab.png');background-repeat: no-repeat; background-size:contain;background-position: center;
    }
    .footer-image2{
        width:50%;height:400px;float:right;background-image:url('images/TecHub-HireIrish.png');background-repeat: no-repeat; background-size: contain;background-position: center;
    }
    .footer-image-div{
        width:100%;min-height:400px;
    }
    .block-search{
        padding: 0;
    }
    
@media (max-width: 767px) {
    .freelancer-heading{
        margin-top: 10px;
    }
    .freelancer-container{
        margin-top: 100px;
    }
    .header-heading{
        font-size: 20px;
    }
    .form-setting{
        margin-left: 25px;
    }
    .block-search{
        margin-top: 60px;
    }
    .button-div{
        width:220px;min-height:50px;margin-left:auto;margin-right:auto;
    }
    .header-count{
        padding-top:10px;color:yellow;padding-left:40px;font-size:50px;
    }
    .image-width{
        width: 100%;
    }
    .slider-div{
        width:100%;min-height:200px;background:silver;background-image:url('images/banner.png');position:relative;margin-top:-40px;background-repeat: no-repeat; background-size: 100%;background-position: center;
    }
    .footer-image{
        width:100%;min-height:200px;float:left;background-image:url('images/HireIrish-Lab.png');background-repeat: no-repeat; background-size:contain;background-position: center;
    }
    .footer-image2{
        width:100%;height:200px;float:left;background-image:url('images/TecHub-HireIrish.png');background-repeat: no-repeat; background-size: contain;background-position: center;
    }
    .footer-image-div{
        width:100%;min-height:200px;
    }

    }
    </style>
    <link rel="stylesheet" href="jquery.tag-editor.css">
    <style type="text/css">
    #columns .warpper {
    position: relative;
    z-index: 3;
    padding: 30px 0 30px;
}
.btn-success{
    background-color:#197B30 !important;
}
    </style>
</head>
<body id="index" class="index">
    <div id="all">
        <!-- header -->
       <?php include('header.php');?>
     
        <div id="columns" class="columns-container">
            <div class="bg-top"></div>
            <div class="warpper">
                <!-- container -->
               

                
                <div class="container">
                    <?php if(empty($users)):?>
                    <h2 style="text-align:center;">No Freelancer Found!</h2>
                <?php else:?>
                <div class="col-md-12">
                <h3>Choose Your Freelancer.</h3>
                <br>
                </div>
                <br>
                    <?php foreach($users['projects'] as $user):?>
                    <div class="col-md-3 col-xs-11">
                        <div style="width:100%;min-height:200px;background:white;margin-bottom:20px;">
                            <div style="width:100%;height:30px;background:#197B30;">
                                <h5 style="color:#fff;padding:5px;"><?php echo $user['fname'];?> <?php echo $user['lname'];?><span style="float:right;"><?php echo $user['county'];?></span></h5>

                            </div>
                           
                            <div style="width:100px;height:100px;background:red;border-radius:50%;margin-left:auto;margin-right:auto;margin-top:1px;"><img src="images/<?php echo $user['image'];?>"  style="width:100%;height:100px;border-radius:50%;"></div><br>
                            <h6 style="color:#000;text-align:center;"><?php echo $user['position'];?></h6>
                            <hr style="color:#197B30;border:2px solid #197B30;margin-top:2px;margin-bottom:3px;">
                            <h5 style="color:#000;text-align:center;">Qualification</h5>
                            <p style="color:#000;text-align:center;line-height:0.6;"><?php echo $user['q_title'];?></p>
                            <hr style="border:2px solid green;margin-top:2px;margin-bottom:3px;">
                            <h5 style="color:#000;text-align:center;">Expert In</h5>
                            <ul class="list-inline clearfix" style="text-align:center;">
                                            <?php $skills = explode(',', $user['skills']);?>
                                            <?php foreach($skills as $data):?>
                                            <li><a href="#" title="Graphic"><?php echo $data;?></a></li>
                                            <?php endforeach;?>
                                        </ul>
                            <div class="button-div">
                             <a href="viewprofile.php?userid=<?php echo $user['id'];?>" target="_blank"><button class="btn btn-md btn-success" style="background-color:#197B30;min-width:100px;">View Profile</button></a>
                             <a href="postjob.php" style="<?php if(isset($_SESSION['usertype'])){if($_SESSION['usertype']=='user'){echo 'display:none';}}?>"><button class="btn btn-md btn-success" style="background:#197B30;margin-left:2px;min-width:100px;">Hire Me</button></a>
                            </div>
                           
                            </div>

                    </div>
                <?php endforeach;?>
                <?php endif;?>
                   
                    <br>
                </div>
                <br><br>
                 
              <div class="container">
                <?php if($users['totalPages'] > 1): ?>
            <div class="row-fluid">
                <ul class="pagination">
                    <?php for($i = 1; $i <= $users['totalPages']; $i++): ?>
                    <li><a href="viewfreelancers.php?page=<?php echo $i; ?>" style="background:#fff;margin-left:3px;"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
                <div class="container">
                    <?php if(!isset($_POST['search'])):?>
                   
               <?php else:?>
           <?php endif;?>
                    <br>
                    
                    
                </div>
            
                       
                   
            <div class="bg-bottom"></div>
        </div>
            </div><!-- end warpper -->
            <div class="bg-bottom"></div>
        </div><!--end columns-->

                <!-- container -->
               
        <!-- footer-->
        <!-- end footer -->
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
     <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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

</body></html>