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
</style>
</head>
<body>
<div id="featurebar" class="featurebar">
<p class="featurebar__links">
<span>Hootpile Beta</span>
<a class="fb_link" href="#">About</a>
<a class="fb_link" href="/<?php echo $username ?>"><?php echo $name ?></a>
<a class="fb_link" href="/hootpile/VITalk">VITalk</a>
<a class="fb_link" href="/hootpile/logout.php">Logout</a>
</p>
</div><br><br><br>
<p>still in development.</p>
</body>
</html>