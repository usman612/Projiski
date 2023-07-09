<?php
session_start();
require 'classes/user.php';
$obj = new User;

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
    $users = $obj->getAllFreelancers();
    }



    $sliderusers = $obj->getAllFreelancers();


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
    <title>Projiski</title>
    
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
    <style>
        body { margin: 0; padding: 0; border: 0; min-width: 320px; color: #777; }
       
        p, td { line-height: 1.5; }
        ul { padding: 0 0 0 20px; }

       .block-search ul{
        min-height: 50px;
        background: #eee
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
        width:100%;min-height:500px;background:silver;background-image:url('images/banner.jpg');position:relative;margin-top:-40px;background-repeat: no-repeat; background-size: 100%;
    }
    .footer-image{
        width:50%;min-height:350px;float:left;background:#fff;border-right: 1px solid #eee;
    }
    .footer-image2{
        width:50%;height:350px;float:right;background-color:#fff;
    }
    .footer-image-div{
        width:100%;min-height:400px;
    }
    .block-search{
        padding: 0;
    }
    .left-small-image{
        width:150px;min-height:150px;margin-top:100px;margin-left:10px;float:left;
    }
    .right-small-image{
        width:150px;min-height:150px;margin-top:100px;margin-right:10px;float:right;
    }
    .left-big-heading{
        font-size:70px;color:#000;text-align:right;
    }
    .left-inner{
        width:500px;min-height:auto;float:right;padding-right:10px;
    }
    .right-inner{
        width:500px;min-height:auto;float:left;padding-right:10px;
    }
    .right-text{
        text-align:left;padding-left:10px;text-align:justify;font-size:21px;padding-top:5px;
    }
    @media (max-width: 768px) {
    .freelancer-container{
        margin-top: 130px;
    }
    }
@media (max-width: 767px) {
    .left-inner{
        width:100%;min-height:auto;float:right;padding-right:10px;
    }
    .right-text{
        text-align:left;padding-left:10px;text-align:justify;font-size:17px;padding-top:5px;
    }
    .right-inner{
        width:100%;min-height:auto;float:left;padding-right:10px;
    }
    .left-small-image{
        width:100%;min-height:150px;margin-top:100px;margin-left:10px;float:left;
    }
    .right-small-image{
        width:100%;min-height:150px;margin-top:100px;margin-right:10px;float:left;
    }
    .left-big-heading{
        font-size:30px;color:#000;text-align:right;
    }
    .freelancer-heading{
        margin-top: 30px;
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
        width:100%;min-height:200px;background:silver;background-image:url('images/banner.jpg');position:relative;margin-top:-40px;background-repeat: no-repeat; background-size: 100%;
    }
    .footer-image{
        width:100%;min-height:auto;float:left;border-bottom: 1px solid #eee;
    }
    .footer-image2{
        width:100%;height:auto;float:left;;
    }
    .footer-image-div{
        width:100%;min-height:200px;
    }

    }
    .block-search a{
        border-bottom: none;
    }
    .block-search a:hover{
        border-bottom: none;
    }
    </style>
</head>
<body id="index" class="index">
    <div id="all">
        <!-- header -->
       <?php include('header.php');?>
       <div class="wrapper ">
        <div class="slider-div">
            <h1 class="header-count"><?php if(count($sliderusers)<10){echo "0".count($sliderusers);}?></h1>
            <h1 class="header-heading">IT Professionals <br> Ready to work World Wide</h1>
        </div>
       </div>
        <div id="columns" class="columns-container">
            <div class="bg-top"></div>
            <div class="warpper">
                <!-- container -->
                <div class="container">
                    <div id="block-search" class="block-search">
                        <form  method="POST" id="searchbox" action="" class="form-horizontal form-setting" style="position:absolute;margin-top:-140px;width:78%;">
                            <div class="form-group">
                                  <div class="col-lg-4 col-md-3 col-sm-12 col-xs-6 col-sp-12">
                                    <select id="selectCategories" class="form-control" name="category" onchange="checkFunction()">
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
                                <div class="col-lg-4 col-md-3 col-sm-12 col-xs-6 col-sp-12">
                                    <textarea id="hero-demo" class="form-control" name="searchskills"></textarea>
                                     <span style="float:right;"><a href="#" data-toggle="tooltip" id="tooltiptest" title="Here you can search your best Freelancer by writing tags like desginer,developer,salesman etc. "><i class="fa fa-question-circle" aria-hidden="true" style="color:#000;font-size:15px;"></i></a></span>
                                </div>

                              
                                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-sp-12">
                                    <select id="selectLocation" class="form-control">
                                        <option selected="selected">Location</option>
                                        <option>Hackballs Cross</option>
                                        <option>Hacketstown</option>
                                        <option>Aah yn Ree</option>
                                        
                                    </select>
                                </div> -->
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-6 col-sp-12 fr-search">
                                    <button type="submit" name="search" class="btn btn-success" style="background:#197B30;">Search now</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end #search_block_top -->
                </div> <!-- end container -->

            
                <div class="container freelancer-container">
                    <h3 style="padding-left:12px;" class="freelancer-heading">Local Experts working with us</h3>
                    <?php if(empty($users)):?>
                    <h2 style="text-align:center;">No Freelancer Found!</h2>
                <?php else:?>
                    <?php foreach($users as $user):?>
                    <div class="col-md-3">
                        <div style="width:100%;min-height:200px;background:white;margin-bottom:20px;">
                            <div style="width:100%;height:30px;background:#197B30;">
                                <h5 style="color:#fff;padding:5px;"><?php echo $user['fname'];?> <?php echo $user['lname'];?><span style="float:right;"><?php echo $user['county'];?></span></h5>

                            </div>
                           
                            <div style="width:100px;height:100px;border-radius:50%;margin-left:auto;margin-right:auto;margin-top:1px;"><img src="images/<?php echo $user['image'];?>"  style="width:100%;height:100px;border-radius:50%;"></div><br>
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
                
                <div class="container">
                    <?php if(!isset($_POST['search'])):?>
                    <a href="viewfreelancers.php">
                   <div style="width:50%;min-height:50px;background:#197B30;margin-left:auto;margin-right:auto;"><h2 style="text-align:center;color:#fff;padding-top:8px;">View More</h2></div>
                   </a>
               <?php else:?>
           <?php endif;?>
                    <br>
                   
                </div>
            <div class="container" style="display:none;">
                    <div class="about-us">
                        
                       






                        
                       
                    </div><!-- end about-us -->
                </div>
                    
                   
           
        </div>
            </div><!-- end warpper -->
           
        </div><!--end columns-->

                <!-- container -->
               
        <!-- footer-->
        <!-- end footer -->
        <?php include('footer.php');?>
        <!-- backtop -->
        <div class="go-up" style="display: none;">
            <a href="#"><i class="fa fa-chevron-up"></i></a>    
        </div><!-- end backtop -->
    </div>
    <?php include('header2.php');?>

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

        function checkFunction()
        {
           var selectedcategory = $('#selectCategories :selected').val();
           if(selectedcategory==1)
           {
            $("[title]").attr('title', ' HTML, CSS, BOOTSTRAP, JAVASCRIPT, JQUERY, PHP, MYSQL, CODEIGNITER, LARAVEL, WORDPRESS, CMS');
           }
           if(selectedcategory==2)
           {
            $("[title]").attr('title', 'ANDROID, IPHONE, UNITY3D, SWIFT, BASIC C');
           }
           if(selectedcategory==3)
           {
            $("[title]").attr('title', 'CONTENT WRITER, DEMO');
           }
           if(selectedcategory==4)
           {
            $("[title]").attr('title', 'DESIGNER, PHOTOSHOP, CORELDRAW, ILLUSTRATOR');
           }
           if(selectedcategory==5)
           {
            $("[title]").attr('title', 'DATA ENTRY, CONTENT WRITER');
           }
           if(selectedcategory==6)
           {
            $("[title]").attr('title', 'PRODUCT SOURCING, MANUFACTURER, ENGINEER');
           }
           if(selectedcategory==7)
           {
            $("[title]").attr('title', 'SALES MAN, MARKETER');
           }
           if(selectedcategory==8)
           {
            $("[title]").attr('title', 'ACCOUNTANT, MARKETER, MANAGER');
           }
           if(selectedcategory==9)
           {
            $("[title]").attr('title', 'HELPER, SERVICE PROVIDER, SALESMAN, MARKETER');
           }
        }
    </script>

</body></html>