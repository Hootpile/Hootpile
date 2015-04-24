<?php
$conn = mysqli_connect("localhost","","","subscribers");
?>
<?php
if (isset($_GET['u'])) {
	$username = mysqli_real_escape_string($conn,$_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = mysqli_query($conn,"SELECT username, name FROM users2 WHERE username='$username'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$username = $get['username'];
	$name = $get['name'];	
	}
	else
	{
	echo "<meta http-equiv=\"refresh\" content=\"0; url=/index.php\">";	
	exit();
	}
	}
}
?>
<?php
 $get_info = mysqli_query($conn,"SELECT * FROM users2 WHERE username='$username'");
  $get_row = mysqli_fetch_assoc($get_info);
  $bio = $get_row['bio'];
  $tagline = $get_row['tagline'];
  $name = $get_row['name'];
  $school = $get_row['branch'];
   $member = $get_row['member'];
  $brag = $get_row['brag'];
  $facebook = $get_row['facebook'];
  $twitter = $get_row['twitter'];
  $other = $get_row['other'];
  $gender = $get_row['gender'];
  $birthday = $get_row['birthday'];
  $relation = $get_row['relation'];
  $block = $get_row['block'];
  $mobile = $get_row['mobile'];
  $address = $get_row['address'];
  $register = $get_row['register'];
?>
<?php
$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = $user;
$user_posted_to = $username;

$sqlCommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 

}
?>
<?php
 $get_user_info = mysqli_query($conn,"SELECT profile_pic FROM users2 WHERE username='$username'");
                                                $get_info = mysqli_fetch_assoc($get_user_info);
                                                $profilepic_info = $get_info['profile_pic'];
                                                if ($profilepic_info == "") {
                                                 $profilepic_info = "http://www.hootpile.com/images/default_hootpile.png";
                                                }
                                                else
                                                {
                                                 $profilepic_info = "http://www.hootpile.com/userdata/profile_pics/".$profilepic_info;
                                                }
                                                ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $name; ?> | Hootpile</title>
<meta charset="utf-8">
<meta content="noodp,noydir" name="robots">
<meta content="The latest Hoots from <?php echo $name; ?> (@<?php echo $username; ?>), student at VIT University. <?php echo $bio; ?>" name="description">
<meta itemprop="name" content="<?php echo $username; ?> | Hootpile"/>
<meta itemprop="description" content="The latest Hoots from <?php echo $name; ?> (@<?php echo $username; ?>), student at VIT University. <?php echo $bio; ?>"/>
<meta itemprop="image" content="<?php echo $profilepic_info; ?>"/>
<meta name="twitter:card" content="<?php echo $bio; ?>"/>
<meta name="twitter:site" content="Hootpile"/>
<meta name="twitter:title" content="<?php echo $username; ?> | Hootpile">
<meta name="twitter:description" content="The latest Hoots from <?php echo $name; ?> (@<?php echo $username; ?>), student at VIT University. <?php echo $bio; ?>"/>
<meta name="twitter:creator" content="<?php echo $username; ?> "/>
<meta name="twitter:image:src" content="<?php echo $profilepic_info; ?>"/>
<meta name="twitter:domain" content="http://www.hootpile.com/<?php echo $username; ?>"/>
<meta property="og:type" content="profile"/>
<meta property="profile:username" content="<?php echo $username; ?>"/>
<meta property="og:title" content="<?php echo $username; ?> | Hootpile"/>
<meta property="og:description" content="The latest Hoots from <?php echo $name; ?> (@<?php echo $username; ?>), student at VIT University. <?php echo $bio; ?>"/>
<meta property="og:image" content="<?php echo $profilepic_info; ?>"/>
<meta property="og:url" content="http://www.hootpile.com/<?php echo $username; ?>"/>
<meta property="og:site_name" content="Hootpile"/>
<meta property="og:see_also" content="http://www.hootpile.com"/>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61341818-1', 'auto');
  ga('send', 'pageview');

</script>
<link type="image/x-icon" rel="shortcut icon" href="http://www.hootpile.com/images/favicon.ico"/>
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
	width: 40%; 
	float:left;
}
.main_logo {
    position: relative;
    width: 3.75rem;
    z-index: 2;
}
.div_right {
	width: 60%; 
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
</style>
<style type="text/css">
#about {

	position: relative;
	text-align: center;
	margin-left: 40px;
	padding: 15px;
	width:350px;
	background: rgb(54, 25, 25);
	background: rgba(240, 240, 240, .8);
  
} #about img {
  
	width: 200px;
	background-size: cover;
	border-radius: 100px;
	-webkit-border-radius: 100px;
	-moz-border-radius: 100px;
	max-width: 100%;
	height: auto;
	width: auto\9; /* ie8 */
  
} 
#content {

	position: relative;
	background: #fff;
	padding: 20px;
	height: 50%;

}
html, body {

	width: 100%;
	height: 100%;
	margin: 0;	
	
}
#profile_link {
color: #8899a6;
}
.main_logo {
    position: relative;
    width: 3.75rem;
    z-index: 2;
}
.SignupCallOut {
    background-color: #8899a6;
    border: 1px solid #e1e8ed;
    border-radius: 6px;
    padding: 15px;
    width: 300px;
    margin-top:10px;
    margin-left:45px;
}
.SignupCallOut-title {
    color: #fff;
    font-size: 18px;
    font-weight: 340;
    line-height: 26px;
    margin-bottom: 5px;
}
.u-textBreak {
    word-wrap: break-word !important;
}

</style>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300);

/* Using box shadows to create 3D effects */
#container {
	width: 350px;
	height: auto;
	margin: 10px auto;
	padding: 20px;
	background: #418bbc;
	background: linear-gradient(#418bbc, #5497C3);
	border-radius: 3px;
  overflow:auto;
}

#button{
  position:relative;
  background: #35bf65;
	box-shadow: 0px 4px #1fa54c; 
  color: white;
  float:left;
  border:none;
  height:36px;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  border-radius:3px; 
  width:100px;
  font-size:16px;
  margin-right:12px;
  text-shadow:0 1px 0 rgba(0,0,0,.4);
  outline:none;
  border:none;
  transition: all 0.2s ease;
  cursor:pointer;
}

#button:active {
	top: 4px;
	box-shadow: none;
}
a{ 
color:black;
text-decoration:none;
}
a:hover {
text-decoration:underline;
}
.divone, .divtwo {
display:inline-block;
}
#updateboxarea {
    background-color: #ffffff;
    border: 1px solid #d6d7da;
    border-radius: 4px;
    margin-bottom: 20px;
    padding: 12px;
        width: 450px;
        margin-left:80px;
}
#update {
    border: 1px solid #bdc7d8;
    font-size: 13px;
    height: 55px;
    margin-top: 5px;
    padding: 5px;
    width: 410px;
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
th {
font-weight:normal;
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
<?php
session_start();
if (!isset($_SESSION["user_login"])) {
echo '<a class="fb_link" href="">Home</a>
<a class="fb_link" href="https://docs.google.com/forms/d/1_KWStVBhPNeskXHdtzrdBn_b7nYF530V-zBiuhXow6o/viewform">Feedback</a>
<a class="fb_link" href="/index.php">Log In</a>
<a class="fb_link" href="/register">Register</a>';
}
else
{
echo '<a class="fb_link" href="/home.php">Home</a>
<a class="fb_link" href="/editprofile">Edit Profile</a>
<a class="fb_link" href="/Settings">Settings</a>
<a class="fb_link" href="/logout.php">Logout</a>';
}
?>
</p>
</div><br><br>
	<div class="div_left">
	<div id="about"> <!-- User profile -->
	  <img src="<?php echo $profilepic_info ?>" width="200" height="200" alt="<?php echo $username;?>">
	  <h2><?php echo $name; ?></h2>
	  <p><?php echo $bio; ?></p>
	  <p>Student at VIT University.</p>
                                   <div class="fb-share-button" data-href="http://www.hootpile.com/<?php echo $username; ?>" data-layout="button_count"></div>
                                   <div class="fb-send" data-href="http://www.hootpile.com/<?php echo $username; ?>" data-colorscheme="light"></div>
                              </div>
	  
	<?php
if (!isset($_SESSION["user_login"])) {
echo '
<div class="SignupCallOut js-signup-call-out ">
<div class="SignupCallOut-header">
<h3 class="SignupCallOut-title u-textBreak">
Are you from VIT University ? Sign Up Now.
</h3>
</div></div><br>';}
else {
echo '';
}?>
<img src="http://i.imgur.com/JPMyxfL.png" width="300" style="margin-left:30px;" alt="VIT University SITE">
<div style="background-color: #EEEEF1; width:300px; padding:20px 30px; margin-left:30px;">
<p><img class="_51sw img" src="https://www.facebook.com/images/profile/timeline/app_icons/info_24.png" alt="SJT" title="SJT"> Story of <?php echo $name; ?></p><hr>
<p style="font-weight:bold;">Tagline</p>
<?php echo $tagline; ?>
<p style="font-weight:bold;">School</p>
<?php echo $school; ?>
<p style="font-weight:bold;">Core Commitee Member</p>
<?php echo $member; ?>
<p style="font-weight:bold;">Bragging Rights/Achievements</p>
<?php echo $brag; ?>

</div>
<br>
<div style="background-color: #EEEEF1; width:300px; padding:20px 30px; margin-left:30px;">
<p>Links</p><hr>
<strong>Hootpile URL</strong><br>
<a href="http://www.hootpile.com/<?php echo $username; ?>">hootpile/<?php echo $username; ?></a><br>
<p style="font-weight:bold;"><img class="xfa" alt="" src="//s2.googleusercontent.com/s2/favicons?domain=www.facebook.com&amp;alt=p"> Facebook</p>
<a href="<?php echo $facebook; ?>"><?php echo $facebook; ?></a><br>
<p style="font-weight:bold;"><img class="xfa" alt="" src="//s2.googleusercontent.com/s2/favicons?domain=www.twitter.com&amp;alt=p"> Twitter</p>
<a href="<?php echo $twitter; ?>"><?php echo $twitter; ?></a><br>
<p style="font-weight:bold;">Other Profiles</p>
<a href="<?php echo $other; ?>"><?php echo $other; ?></a>
</p>
</div><br>
<div style="background-color: #EEEEF1; width:300px; padding:20px 30px; margin-left:30px;">
<p>Basic Information</p><hr>
<p>Gender: <?php echo $gender; ?></p>
<p>Birthday: <?php echo $birthday; ?></p>
<p>Relationship: <?php echo $relation; ?></p>
</div><br>
<div style="background-color: #EEEEF1; width:300px; padding:20px 30px; margin-left:30px;">
<p>Contact Information</p><hr>
<p style="font-weight:bold;">Hostel Block & Room</p>
<?php echo $block; ?>
<p style="font-weight:bold;">Mobile No: </p>
<?php echo $mobile; ?>
<p style="font-weight:bold;">Home Address: </p>
<?php echo $address; ?>
</div><br><br>
	</div>

<div class="div_right">
<div style="background-color: #EEEEF1; width:550px; padding:20px 30px;">
<p><img class="_51sw img" src="https://www.facebook.com/images/profile/timeline/app_icons/info_24.png" alt="SJT" title="SJT"> About <?php echo $name; ?></p><hr>
<table>
<tr>
<td>
<p style="font-weight:bold;text-align:center;">Register</p>
</td>
<td>
<p style="font-weight:bold;text-align:center;">School</p>
</td>
<td>
<p style="font-weight:bold;text-align:center;">Achivements</p>
</td>
</tr>
<tr>
<th><?php echo $register; ?></th>
<th><?php echo $school; ?></th>
<th><?php echo $brag; ?></th>
</table>
</div>
<br><br>
	<?php
if (!isset($_SESSION["user_login"])) {
echo '';}
else {
echo '<div id="updateboxarea">
<p>Share on his/her Profile, talk to other VITians through this.</p>
<form action="" method="post">
<textarea id="update" name="post"></textarea>
<div id="controlButtons">
<span class="floatRight">
<input id="update_button" class="update_button wallbutton update_box" type="submit" name="send" value=" Update "></input>
</span>
</div>
</form>
</div>';
}?>
	<?php
//If the user is logged in
$getposts = mysqli_query($conn,"SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
$posts = mysqli_num_rows($getposts);
if($posts == 0){
	echo "<article class='post'>
	 <div class='post-content'>
<div class='content'>
<img src='http://www.hootpile.com/images/small.png' id='post_photo' alt=''></img>
<a href='/$added_by'>@hootpile</a>
<p>$username's News Feed is currently empty, other VITians haven't started interacting with you yet!<br>but you can start posting on your friends profile or learn more on my profile.</p>
</div>
</div></article><br>";
}
else {
while ($row = mysqli_fetch_array($getposts,MYSQLI_ASSOC)) {
						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  
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
                                                $reg_exUrl = "/(http|https|ftp|ftps|www)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                                if(preg_match($reg_exUrl, $body, $url)) {
                                                $body = preg_replace($reg_exUrl, "<a href='{$url[0]}' id='post_link'>{$url[0]}</a> ", $body);
                                                }
	 echo "
	 <article class='post'>
	 <div class='post-content'>
<div class='content'>
<img src='$profilepic_info3' id='post_photo' alt='$username'>
<a href='/$added_by'>@$added_by</a>
<p>$body</p>
</div>
</div></article>
	 ";
	 }
}
?>
	</div>
