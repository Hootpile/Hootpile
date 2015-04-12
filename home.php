<?php
$conn = mysqli_connect("localhost","root","","users") or die(mysql_error());
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=hootpile/index.php\">";
}
else
{
}
?>
<?php
$name = mysqli_query($conn,"SELECT name,username FROM users WHERE username='$user'");
$row = mysqli_fetch_array($name,MYSQLI_ASSOC);
$name = $row['name'];
$username = $row['username'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Hootpile</title>
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
</style>
</head>
<body>
<div id="featurebar" class="featurebar">
<p class="featurebar__links">
<span>Hootpile Beta</span>
<a class="fb_link" href="#">About</a>
<a class="fb_link" href="/<?php echo $username ?>"><?php echo $name ?></a>
<a class="fb_link" href="/hootpile/Notes">Notes</a>
<a class="fb_link" href="/hootpile/logout.php">Logout</a>
</p>
</div><br><br><br>
<div class="div_left">
<a href="/hootpile">
<img src="/hootpile/small.png" width="140px" height="" style="" alt="Hootpile">
</a><br>
<a href="#" id="manifesto" onclick="read();">Read the manifesto</a>
<br>
<div class="manifesto" style="height: auto;">
<p id="read"></p>
</div>
</div>
<script type="text/javascript">
function read(){
	document.getElementById('read').innerHTML="Hootpile is social utility that is <br>trying to transform how students at<br> VIT University connect wth each other.<br><br>Hootpile is free from advertising, <br>manipulation and exploitation.<br><br>While we realize this, we need your <br>support to spread the word. Share Hootpile's Manifesto on your social networks and <br>let's make this a great product. ";
}
</script>
<br>
<div class="div_right">
<?php
//If the user is logged in
$getposts = mysqli_query($conn,"SELECT * FROM posts WHERE user_posted_to='$user' ORDER BY id DESC LIMIT 10") or die(mysql_error());
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
<a href='/hootpile/$added_by'>@$added_by</a>
<p>$body</p>
</div>
</div></article>
	 ";
	 }
}
?>
</div>
</body>
</html>