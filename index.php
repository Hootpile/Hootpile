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
    echo "";
}
else
{
    echo "<meta http-equiv=\"refresh\" content=\"0; url=./home.php\">";	
}
?>
<?php
//Login Script
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
    $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
    $md5password_login = md5($password_login);

    $sql = mysqli_query($conn, "SELECT id FROM users WHERE username='$user_login' LIMIT 1"); // query the person

    //Check for their existance
    $userCount = mysqli_num_rows($sql); //Count the number of rows returned

    if ($userCount == 1) {
        while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
             $rahul = $row["id"];
        }

        $_SESSION["id"] = $rahul;
        $_SESSION["user_login"] = $user_login;
        $_SESSION["password_login"] = $password_login;
        // exit("<meta http-equiv=\"refresh\" content=\"0\">");
    } else {
        echo 'That information is incorrect, try again';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hootpile</title>
<link rel="stylesheet" href="style.css" type="text/css"/>
 <meta charset="utf-8"/>
 <meta content="noodp,noydir" name="robots"/>
 <meta content="Hootpile is a great social platform for simplicity and Transparency." name="description"/>
<link type="image/x-icon" rel="shortcut icon" href="http://www.hootpile.com/images/favicon.ico"/>
<style type="text/css">
.animate
{
	transition: all 0.1s;
	-webkit-transition: all 0.1s;
}

.action-button
{
	position: absolute;
	padding: 7px 20px;
  margin: 10px 10px 10px 0px;
	border-radius: 6px;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size: 20px;
	color: #FFF;
	text-decoration: none;	
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
</style>
</head>
<body class="logged_out_page_big_signup">
<div class="main_full_width content contents main_content ContentWrapper">
<div id="__w2_CGUJeDS_content">
<div id="ld_cvfkff_190">
<div class="HomeLoggedOutBigSignup">
<div class="logo"></div>
<div class="tagline">
<div class="spacer"></div>
<h1>Hootpile</h1>
<h2>Simple & Beautiful.</h2>
<a href="/hootpile/register" class="action-button shadow animate green">Sign Up</a>
</div>
<div class="container">
<div style="width: 50%; float:right; margin: 20px -40px 0px 0px;">
<span class="tos_disclaimer">
Hootpile is a great platform for<br/> simplicity and Transparency.<br/><br/> It can be a tool for empowerment <br/>and guess what<br/> we
respect your privacy.
</span>
</div>
<div class="login">
<div id="ld_dhndbs_281">
<div id="__w2_QKX9Hyl_logged_out_header_login">
<div id="__w2_QKX9Hyl_associated" class="associated_login"></div>
<div class="regular_login">
<form id="__w2_QKX9Hyl_login_form" action="" name="form1" class="inline_login_form" method="POST">
<div class="title">Sign In</div>
<div class="form_inputs">
<div class="form_column">
<input id="__w2_QKX9Hyl_email" class="text header_login_text_box ignore_interaction" name="user_login" type="text" tabindex="1" placeholder="Email">
</div>
<div class="form_column">
<input id="__w2_QKX9Hyl_email" class="text header_login_text_box ignore_interaction" name="password_login" type="password" tabindex="1" placeholder="Password">
</div>
<div class="form_column">
<input id="__w2_QKX9Hyl_submit_button" class="submit_button ignore_interaction" name="button" type="submit" tabindex="2" value="Log In">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div></div>
</body>
</html>
