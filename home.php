<?php
$conn = mysqli_connect("localhost","","","subscribers");
if(!$conn)
{
die("Unable to connect to database");
}
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=/index.php\">";
}
else
{
}
?>
<?php
$name = mysqli_query($conn,"SELECT name,username FROM users2 WHERE username='$user'");
$row = mysqli_fetch_array($name,MYSQLI_ASSOC);
$name = $row['name'];
$username = $row['username'];

$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = $user;
$user_posted_to = $user;
$post = stripslashes($post);
$post = htmlspecialchars($post);
$post = strip_tags($post);
$sqlCommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Hootpile</title>
<link type="image/x-icon" rel="shortcut icon" href="http://www.hootpile.com/images/favicon.ico"/>
<script type="text/javascript" src="http://www.hootpile.com/jquery.js"></script>

<script type="text/javascript" >
$(function() 
{
$(".delete").click(function(){
var element = $(this);
var I = element.attr("id");
$('li#list'+I).fadeOut('slow', function() {$(this).remove();});		
return false;
});
});
</script>
<script type="text/javascript">
$(function()
{
$(".search_button").click(function()
{
var search_word = $("#search_box").val();
var dataString = 'search_word='+ search_word;

if(search_word=='')
{
}
else
{
$.ajax({
type: "GET",
url: "http://www.hootpile.com/searchdata.php",
data: dataString,
cache: false,
beforeSend: function(html)
{
document.getElementById("insert_search").innerHTML = '';
$("#flash").show();
$("#searchword").show();
$(".searchword").html(search_word);
$("#flash").html('<img src="http://www.hootpile.com/images/20-1.gif" width="20" /> Loading Results...');
},

success: function(html){
$("#insert_search").show();
$("#insert_search").append(html);
$("#flash").hide();
}

});

}
return false;
});
});
</script>

<style type="text/css">
html {
	 font-family: "AtlasTypewriterRegular","Andale Mono","Consolas","Lucida Console","Menlo","Luxi Mono",monospace;
    font-style: normal;
    font-weight: 400;
}
.featurebar {
    background-color: #418bbc;
    height: 1.875rem;
    z-index: 1105;
}
.featurebar, .navbar, .toolbar, .page-background, .omnibar, .searchbar {
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
}
.featurebar__links {
	color: white;
    left: 1.875rem;
}
.featurebar__links {
    left: 0.9375rem;
    margin: 0;
    position: absolute;
    top: 0.3125rem;
}
.featurebar__links > span, .featurebar__links .fb_link:not(.fb_toggle) {
    margin-right: 1.25rem;
}
.featurebar a {
    display: inline-block;
    position: relative;
	color: white;
	text-decoration:none;
}
.featurebar a:hover {
	text-decoration:underline;
}
.div_left {
	width: 30%; 
	float:left;
	margin-bottom:232px;
}
.main_logo {
    position: relative;
    width: 3.75rem;
    z-index: 2;
}
.div_right {
	width: 70%; 
	float:right;
	
}
.animate
{
	transition: all 0.1s;
	-webkit-transition: all 0.1s;
}

.action-button
{
	position: absolute;
	padding: 3px 10px;
  margin: 30px 10px 10px 0px;
	border-radius: 0px;
	font-size: 20px;
	font-family: "AtlasTypewriterRegular","Andale Mono","Consolas","Lucida Console","Menlo","Luxi Mono",monospace;
	color: #FFF;
	text-decoration: none;	
	cursor:pointer;
}
.green
{
	background-color: #82BF56;
	border-bottom: 5px solid #669644;
	text-shadow: 0px -2px #669644;
}
.action-button:active
{
	transform: translate(0px,5px);
  -webkit-transform: translate(0px,5px);
	border-bottom: 1px solid;
}
.post {
	margin-bottom:40px;
}
.post-content {
  display: block;
  word-wrap: break-word;
}

#read {
  font-size:0.85rem;
  line-height:1.5;
}

#post_photo{
  border-radius: 256px;
  width: 120px; height: 120px;
  /*float: left;*/
  overflow:hidden;
}

/***** NEW STYLES BELOW *****/

.content{
  display: table;
}

#post_photo, .content > p,a{
  display: table-cell;
  vertical-align: middle;
}
.content > p{
  padding-left: 20px;
}
.content > a{
	color:black;
	text-decoration:none;
  padding-left: 20px;
}
.content >a:hover {
	text-decoration:underline;
}
#manifesto {
	color:black;
	text-decoration:underline;
}
.post_form {
	margin-left:230px;
	margin-bottom: 30px;
}
.post_form textarea {
	font-size: 16px;
  padding: 10px 30px;
}

#updateboxarea {
    background-color: #ffffff;
    border: 1px solid #d6d7da;
    border-radius: 4px;
    margin-bottom: 10px;
    padding: 12px;
    width: 330px;
}
#update {
    border: 1px solid #bdc7d8;
    font-size: 13px;
    height: 50px;
    margin-top: 5px;
    padding: 5px;
    width: 300px;
}
#controlButtons {
height:45px;
}
.floatRight {
    float: right;
}

.wallbutton {
    background-color: #5fcf80;
    border-color: #3ac162;
    border-style: solid;
    border-width: 1px 1px 3px !important;
    color: #fff !important;
    cursor: pointer;
    margin-top:10px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 12px;
    font-weight: bold;
    padding: 7px 9px;
}

#what {
    text-align: left;
}
.alert-info {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #31708f;
    width:330px;
}
.alert-dismissable, .alert-dismissible {
    padding-right: 35px;
}
.alertIn, .alertOut {
    transition: transform 0.22s cubic-bezier(0.25, 0, 0.25, 1) 0s, opacity 0.22s cubic-bezier(0.25, 0, 0.25, 1) 0s;
}
.alert {
    border-radius: 4px;
    margin-bottom: 20px;
    padding:10px 12px;
}
.alert-info2 {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #31708f;
}
.alert-dismissable2, .alert-dismissible2 {
    padding-right: 35px;
}
.alertIn2, .alertOut2 {
    transition: transform 0.22s cubic-bezier(0.25, 0, 0.25, 1) 0s, opacity 0.22s cubic-bezier(0.25, 0, 0.25, 1) 0s;
}
.alert2 {
    border-radius: 4px;
    margin-bottom: 20px;
    padding:10px 12px;
}
#facebook{
	height:60px;
	width:250px;
	overflow:hidden;

	
	padding:6px 10px 14px 10px;;
}
#facebook li{
	border:0; margin:0; padding:0; list-style:none;
}

	#facebook li{
		height:70px;
		padding:5px;
		list-style:none;
		
	}
		#facebook a{
			color:#000000;
			text-decoration:none;
			
		}
		#facebook .user-title{
			display:block;
			font-weight:bold;
			margin-bottom:4px;
			font-size:14px;
			color:#36538D;
		}
		#facebook .addas{
			display:block;
			font-size:14px;
			color:#666666;
		}
		#facebook img{
			float:left;
			margin-right:14px;
			padding:4px;
			
		}
		#facebook .del
		{
		float:right; font-weight:bold; color:#666666
		}
		#facebook .del a
		{
		color:#000000;
		}
		/* Post Index */
#postIndex {
  margin: 1em auto;
}

.news a {
  display: block;
  overflow: hidden;
  border-top: .063em solid #ccc;
  border-bottom: .063em solid #ccc;
  font-size:14px;
}
.postImg {
  float: left;
  width: 25%;
  box-sizing: border-box;
  padding-right: 2em;
}

.postImg img {
  width: 100%;
}

.news a h2 {
  color: #222;
  float: left; 
  font-size:14px;
}

.news a:hover h2 {
}

.news a p {
  color: #444;
  float: right; 
}

.news a:hover p {
  color: #222;
}
ol.update
{
list-style:none;
font-size:1.1em;
margin-top:20px
}
ol.update li
{
height:70px;
border-bottom:#dedede dashed 1px;
text-align:left;
}
ol.update li:first-child
{
border-top:#dedede dashed 1px;
height:70px;
text-align:left;
}
#flash {
margin-top:8px;
}
#insert_search {
float:left;
}
.search_button{
    -moz-user-select: none;
    background: none repeat scroll 0 0 #2b6dad;
    border: 1px solid #4f5863;
    border-radius: 3px;
    box-shadow: 0 1px 1px 0 rgba(200, 200, 200, 0.2);
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-weight: 500;
    outline: 0 none;
    padding: 3px 7px 4px;
    text-align: center;
    text-decoration: none;
    transition: all 100ms ease-in-out 0s;
}
.search_box {background: none repeat scroll 0 0 #fff;
    border: 1px solid #ccc;
    border-radius: 2px;
    height:20px;
    width:200px;
    padding:0px 10px;
    box-shadow: 0 1px 1px rgba(200, 200, 200, 0.3) inset;
    box-sizing: border-box;
    min-height: 27px;
    outline: 0 none;
    transition: border-color 0.2s ease 0s;
	margin-left:30px;
}
#post_link {
text-decoration:none;
color:black;
}
#post_link:hover {
text-decoration:underline;
}
.alert-danger {
    background-color: #f2dede;
    border-color: #ebccd1;
    color: #a94442;
    width:90%;
}
.alertIn3, .alertOut3 {
    transition: transform 0.22s cubic-bezier(0.25, 0, 0.25, 1) 0s, opacity 0.22s cubic-bezier(0.25, 0, 0.25, 1) 0s;
}
</style>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=442861082492923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="featurebar" class="featurebar">
<p class="featurebar__links">
<span>Hootpile Beta</span>
<a class="fb_link" href="/home.php">Home</a>
<a class="fb_link" href="/<?php echo $username ?>"><?php echo $name ?></a>
<a class="fb_link" href="/Settings">Settings</a>
<a class="fb_link" href="/logout.php">Logout</a>
</p>
</div><br><br>
<div class="div_left">
<a href="/home.php">
<img src="/images/small.png" width="140px" height="" style="" alt="Hootpile">
</a><br>
<div class="alert alert-dismissible alertIn alertOut alert-info ng-animate" ng-show="hasFlash" role="alert" style="">
<span dynamic="flash.text">
<strong class="ng-scope">Heads up!</strong>
<span class="ng-scope"> Hootpile is built to organize everything that VITians care about in one place.</span>
</span>
</div>
<a href="/faculty" id="manifesto">Faculty Information</a><br>
<a href="/editprofile" id="manifesto">Edit Profile</a>
<br>
<a href="https://docs.google.com/forms/d/1_KWStVBhPNeskXHdtzrdBn_b7nYF530V-zBiuhXow6o/viewform?usp=send_form"target="_blank" id="manifesto">Give Feedback</a>
<br>
<div id="updateboxarea">
<p>Share what is happening in VIT.</p>
<p style="font-size:12px;">Your Profile acts like a blog about what you post & share.</p>
<form action="" method="post">
<textarea id="update" name="post"></textarea>
<div id="controlButtons">
<span class="floatRight">
<input id="update_button" class="update_button wallbutton update_box" type="submit" name="send" value=" Update "></input>
</span>
</div>
</form>
</div>
<div class="alert alert-dismissible alertIn alertOut alert-info ng-animate" ng-show="hasFlash" role="alert" style="">
<span dynamic="flash.text">
<strong class="ng-scope">Share your Profile.</strong>
<span class="ng-scope"> In order to discover and let others find you, share your profile.</span><br><br>
<div class="fb-share-button" data-href="http://www.hootpile.com/<?php echo $username; ?>" data-layout="button"></div>
<div class="fb-send" data-href="http://www.hootpile.com/<?php echo $username; ?>" data-colorscheme="light"></div>
</span>
</div>
<a href="#" id="manifesto" onclick="read();">Read the manifesto</a>
<p id="read"></p>
<p style="font-size:13px;">-Hootpile is still in BETA. You may experience some issues.</p>
</div>
<script type="text/javascript">
var i=0;
function read(){
	document.getElementById('read').innerHTML="Hootpile is social utility that is <br>trying to transform how students at<br> VIT University connect with each other.<br><br>Hootpile is free from advertising, <br>manipulation and exploitation.<br><br>While we realize this, we need your <br>support to spread the word. Share Hootpile's Manifesto on your social networks and <br>let's make this a great product.<br>";

}
</script>
<div class="div_right">
<div style="width:65%; float:left;">
<div class="alert2 alert-dismissible2 alertIn2 alertOut2 alert-info2 ng-animate" role="alert" style="">
<span dynamic="flash.text">
<strong class="ng-scope">News Feed: </strong>
<span class="ng-scope"> What other VITians posted on your profile.</span>
</span>
</div>
<?php
//If the user is logged in
$getposts = mysqli_query($conn,"SELECT * FROM posts WHERE user_posted_to='$user' ORDER BY id DESC LIMIT 10") or die(mysql_error());
$posts = mysqli_num_rows($getposts);
if($posts == 0){
	echo "	 <article class='post'>
	 <div class='post-content'>
<div class='content'>
<img src='http://www.hootpile.com/images/small.png' id='post_photo' alt=''></img>
<a href='/$added_by'>@hootpile</a>
<p>Your News Feed is currently empty, other VITians haven't started interacting with you yet!<br>but you can start posting on your friends profile or learn more on my profile.</p>
</div>
</div></article><br>
<div class='alert alert-dismissible alertIn3 alertOut3 alert-danger ng-animate' style=''>
<span>
<strong class='ng-scope'>Oh snap!</strong>
<span class='ng-scope'> You haven't filled up your profile yet, start by that so that other VITians can know who you are. Also, start sharing in post form below.</span>
</span>
</div>";
}
else {
while ($row = mysqli_fetch_array($getposts,MYSQLI_ASSOC)) {
						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  
						$get_user_info = mysqli_query($conn,"SELECT * FROM users2 WHERE username='$added_by'");
                                                $get_info = mysqli_fetch_assoc($get_user_info);
                                                $name = $get_info['name'];
                                                $reg_exUrl = "/(http|https|ftp|ftps|www)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                                if(preg_match($reg_exUrl, $body, $url)) {
                                                $body = preg_replace($reg_exUrl, "<a href='{$url[0]}' id='post_link'>{$url[0]}</a> ", $body);
                                                }
                                                $get_user_info = mysqli_query($conn,"SELECT * FROM users WHERE username='$added_by'");
                                                $get_info = mysqli_fetch_assoc($get_user_info);
                                                $name = $get_info['name'];
                                                 $get_user_info = mysqli_query($conn,"SELECT profile_pic FROM users2 WHERE username='$added_by'");
                                                $get_info = mysqli_fetch_assoc($get_user_info);
                                                $profilepic_info3 = $get_info['profile_pic'];
                                                if ($profilepic_info3 == "") {
                                                 $profilepic_info3 = "http://www.hootpile.com/images/default_hootpile.png";
                                                }
                                                else
                                                {
                                                 $profilepic_info3 = "http://www.hootpile.com/userdata/profile_pics/".$profilepic_info3;
                                                }
	 echo "
	 <article class='post'>
	 <div class='post-content'>
<div class='content'>
<img src='$profilepic_info3' id='post_photo' alt=''></img>
<a href='/$added_by'>@$added_by</a>
<p>$body</p>
</div>
</div></article>
	 ";
	 }
}
?>
</div>
<div style="width:35%;float:right;">
<span style=" padding-left:20px; font-weight:bold;">Search your friends in VIT</span>
  <br><br>
  <form method="get" action="">
<input type="text" name="search" id="search_box" class='search_box'/>
<input type="submit" value="Search" class="search_button" />
</form>

<div id="flash"></div>
<ol id="insert_search" class="update">

</ol>
</div>

<span style=" padding-left:20px; font-weight:bold;">VITian Suggestions</span>
<ul id="facebook">
<?php
$sql=mysqli_query($conn,"SELECT * FROM users2 ORDER BY RAND() LIMIT 10");
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
$user_id=$row['id'];
$user_name=$row['name'];
$username=$row['username'];
$register =$row['register'];
if($register == "") {
$register = "Go to Profile";
}
else {
}
                                                $profilepic_info = $row['profile_pic'];
                                                if ($profilepic_info == "") {
                                                 $profilepic_info = "http://www.hootpile.com/images/default_hootpile.png";
                                                }
                                                else
                                                {
                                                 $profilepic_info = "http://www.hootpile.com/userdata/profile_pics/".$profilepic_info;
                                                }
?>
<li class="myLi" id="list<?php echo $user_id; ?>">
<img src="<?php echo $profilepic_info; ?>" width="32" height="30"/>
<span class="del"><a href="#" class="delete" id="<?php echo $user_id; ?>">X</a></span>
<a href="/<?php echo $username; ?>" class="user-title"><?php echo $user_name;?> </a>
<span class="addas"><?php echo $register; ?></span>
</li>
<?php
}
?>
</ul> 
<span style=" padding-left:20px; font-weight:bold;"><img src="http://www.hootpile.com/images/2015-04-19_1623.png" width="20"> News related to VIT</span>
<section id="postIndex" class="widthWrapper">

    <article class="news">
      <a target="_blank" href="http://broinformation.blogspot.in/2014/04/10-things-everyone-should-know-about.html">
        <h2>10 Things everyone should know about VIT University, Vellore</h2>
        <p>VIT is seriously a fun place to live in but here are the things that everyone should know about VIT.</p>
      </a>
    </article>
     <article class="news">
      <a target="_blank" href="#">
        <h2>Microsoft Screening Test for 2nd Year Students</h2>
        <p>The aim is to build projects with students with Idea Themes from Microsoft and duration is from June to September. Read More in VIT Mail</p>
      </a>
    </article>
    <article class="news">
      <a target="_blank" href="http://broinformation.blogspot.in/2014/04/11-places-to-eat-in-vellorearound-vit.html">
        <h2>11 Places to Eat in Vellore/around VIT which are clearly Underated </h2>
        <p>Its already difficult to find anything about food in vellore on internet. No reviews for anything from Vellore on zomato or burp or anywhere.</p>
      </a>
    </article>
  </section>
  
</div>
</body>
</html>
