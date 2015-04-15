<?php
$conn = mysqli_connect("localhost","rahulkapoor28","Rahulkapoor!28","subscribers");
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
 $get_info = mysqli_query($conn,"SELECT bio FROM users2 WHERE username='$username'");
  $get_row = mysqli_fetch_assoc($get_info);
  $bio = $get_row['bio'];
  if(isset($_POST['send'])){
  $post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = $user;
$user_posted_to = $username;

$sqlCommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 

}
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $name; ?></title>
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
	width: 20%; 
	float:left;
}
.main_logo {
    position: relative;
    width: 3.75rem;
    z-index: 2;
}
.div_right {
	width: 80%; 
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
	width: 20%;
	margin-left: 40px;
	padding: 15px;
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
  text-align: center;
	background: #F0F0F0;
	padding: 20px;
	height: 50%;

}
html, body {

	width: 100%;
	height: 100%;
	margin: 0;	
	background: #F0F0F0;
	
}
#profile_link {
color: #8899a6;
}
.div_left {
	width: 40%; 
	float:left;
	margin-bottom:232px;
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
.SignupCallOut {
    background-color: #8899a6;
    border: 1px solid #e1e8ed;
    border-radius: 6px;
    padding: 15px;
    width: 300px;
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

#textarea {
   float:left;
	height: 28px;
	width: 212px;
	padding: 0 10px;
	background: rgba(0, 0, 0, 0.2);
	border-radius: 3px;
	box-shadow: inset 0px 4px rgba(0, 0, 0, 0.2);
  border:none;

	
	/* Typography */
  font-family:'open sans';
	font-size: 17px;
	line-height: 1.2em;
	color: white;
	text-align: center;
   outline:none;
  word-spacing: -1px;
  padding-top:12px;
   transition: all 0.2s ease;
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
</style>
</head>
<body>
<div id="featurebar" class="featurebar">
<p class="featurebar__links">
<span>Hootpile Beta</span>
<?php
session_start();
if (!isset($_SESSION["user_login"])) {
echo '<a class="fb_link" href="/home.php">Home</a>
<a class="fb_link" href="/index.php">Log In</a>
<a class="fb_link" href="/register">Register</a>';
}
else
{
echo '<a class="fb_link" href="/home.php">Home</a>
<a class="fb_link" href="/Settings">Settings</a>
<a class="fb_link" href="/logout.php">Logout</a>';
}
?>
</p>
</div><br><br>
	<div> <!-- User background -->
		<img style="position: absolute; top: 0px; right: 0px;" src="https://pbs.twimg.com/profile_banners/2603557026/1404484222/1500x500" width="100%" height="585px">
	</div>

	<div id="about"> <!-- User profile -->
	  <img src="https://d324imu86q1bqn.cloudfront.net/uploads/user/avatar/46407/ello-large-a74c9662.png" width="200px" height="200px">
	  <h2><?php echo $name; ?></h2>
	  <p><?php echo $bio; ?></p>
	</div>
	
	<div id="content"> <!-- User Content -->
	<div class="div_left">
	<?php
if (!isset($_SESSION["user_login"])) {
echo '
<div class="SignupCallOut js-signup-call-out ">
<div class="SignupCallOut-header">
<h3 class="SignupCallOut-title u-textBreak">
Are you from VIT University ? Sign Up Now.
</h3>
</div></div>';}
else {
echo '
<div id="container">
<form action="" method="post">
    <input id = "button" name="send" type="submit" value="Hoot" />
  <textarea id = "textarea" name="post">What are you thinking?</textarea>
</form>  
</div>';
}?>
<div class="">
<p>Basic Information</p>
</div>
	</div>
<script type="text/javascript">
var button = document.getElementById("button");
var textarea = document.getElementById("textarea");
var initValue = textarea.value;

/***********Events****************************/
button.addEventListener('onclick', function(){
  return false;}, false);


textarea.addEventListener("click", function(){
  this.style.height=100 + 'px';
  this.style.paddingTop = 10 + 'px';
  this.style.textAlign = 'left';
 
  if (this.value ===initValue){
    //this.setSelectionRange(0, 0);
     this.value = '';
   }
}, false);
  

textarea.addEventListener("blur", function(){
  if (textarea.value=='' || textarea.value ==initValue){ 
    textarea.style.height=''; 
    textarea.value = initValue;
      textarea.style.textAlign = 'center';
  }
}, false);
</script>
	<div class="div_right">
	<?php
//If the user is logged in
$getposts = mysqli_query($conn,"SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
$posts = mysqli_num_rows($getposts);
if($posts == 0){
	echo "
	
	";
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
	 echo "
	 <article class='post'>
	 <div class='post-content'>
<div class='content'>
<img src='https://d324imu86q1bqn.cloudfront.net/uploads/user/avatar/46407/ello-large-a74c9662.png' id='post_photo' alt=''></img>
<a href='/$added_by'>@$added_by</a>
<p>$body</p>
</div>
</div></article>
	 ";
	 }
}
?>
	</div>
	</div>