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
    echo "<meta http-equiv=\"refresh\" content=\"0; url=home.php\">";	
}
?>
<?php
$reg = @$_POST['reg'];
$name = "";
$email = "";
$pswd = "";
$username = "";
$name = strip_tags(@$_POST['name']);
$email = strip_tags(@$_POST['email']);
$pswd = strip_tags(@$_POST['email']);
$username = strip_tags(@$_POST['username']);
if($reg) {
$e_check = mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
//Count the number of rows returned
$email_check = mysqli_num_rows($e_check);	
$u_check = mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
// Count the amount of rows where username = $un
$check = mysqli_num_rows($u_check);
if(empty($name) || empty($email) || empty($username) || empty($pswd)){
	echo "Please fill all the fields.";
}
else if($email_check == 1){
	echo "That email Address also exists";
}
else if($check == 1) {
	echo "Username already exists.";
}
else if(strlen($username) <5){
	echo "Username length must be more than 5 characters.";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "Invalid Email Address";
}
else if(!preg_match("/^([a-zA-Z0-9\-_\.]+\@vit\.ac\.in)$/",$email)) {
	echo "Please Enter VIT Email Address";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
	echo "Only letters and white spaces allowed.";
}
else {
$pswd = md5($pswd);
$query = mysqli_query($conn,"INSERT INTO users VALUES ('','$name','$username','$email','$pswd')");
header("Location: ../index.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hootpile | Register</title>
<style type="text/css">

*, *::before, *::after {
    box-sizing: border-box;
}
.hootpile {
    padding: 1.875rem;
}
.hootpile {
    background-color: #418bbc;
    color: white;
    padding: 1.875rem 0.9375rem;
}
body {
    background-color: white;
    margin: 0;
    overflow: hidden;
    position: relative;
}
html, body {
    height: 100%;
}
*::-moz-selection {
    background: none repeat scroll 0 0 #418bbc;
    color: white;
    text-shadow: none;
}
.hootpile:not(.authentication--tall) .main_authentication {
    left: 0;
    position: fixed;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}
.authentication__header {
    text-align: center;
}
a {
    background: none repeat scroll 0 0 transparent;
    color: inherit;
    text-decoration: none;
}
.authentication__header h1 {
    margin-top: 1.02rem;
    text-align: left;
}
html{
    font-family: "AtlasTypewriterRegular","Andale Mono","Consolas","Lucida Console","Menlo","Luxi Mono",monospace;
    font-style: normal;
    font-weight: 400;
	font-size:22px;
}
.authentication__header h1 {
	font-size:18px;
}
.authentication__header ~ #authentication_view .authentication__form, .authentication__header ~ .authentication__form {
    margin-top: 1.75rem;
}
.authentication__header, .authentication__form {
    margin: 0 auto;
    max-width: 18.5rem;
}
fieldset {
    border: 0 none;
    margin: 0;
    min-width: 0;
    padding: 0;
    position: relative;
}
.authentication__form .form__group::after, .credentials__form .form__group::after, .profile__form .form__group::after {
    background-color: transparent;
    content: "";
    position: absolute;
    right: 0.9375rem;
    top: 1.5rem;
}
.form__group {
    margin-bottom: 0.625rem;
    position: relative;
}
.authentication__form .form__control {
    padding-bottom: 1.25rem;
    padding-top: 1.25rem;
}
.authentication__form .form__control {
    background-color: #c4c4c4;
    border-color: #c4c4c4;
    color: #333333;
    padding-bottom: 0.9375rem;
    padding-top: 0.9375rem;
}
.form__control, .share__control {
    padding-left: 1.8125rem;
    padding-right: 1.8125rem;
}
.form__control, .share__control {
    background-color: #e5e5e5;
    border: 1px solid #e5e5e5;
    border-radius: 0;
    color: #666666;
    font-size: 0.75rem;
    min-height: 1.75rem;
    padding: 1.25rem 1.8125rem 1.25rem 0.9375rem;
    width: 100%;
}
.form__control, .share__control, .form__label, .flag-group, .editor, .toolbar__identity, .toolbar__controls, .toolbar__group a, .drawer__item, .drawer__item .avatar, .drawer__item .avatar--dragging, .omnibar__avatar, .searchbar__field, .noise-column {
    display: inline-block;
    vertical-align: top;
}
.btn, .authentication__form input[type="submit"]{
    transition: background-color 150ms ease 0s, border-color 150ms ease 0s, color 150ms ease 0s, width 150ms ease 0s;
	
}
input, textarea {
    -moz-appearance: none;
    border-radius: 0;
    color: inherit;
    font: inherit;
    margin: 0;
}
.btn--block, .authentication__form input[type="submit"] {
    display: block;
    width: 100%;
}
.btn, .authentication__form input[type="submit"] {
    background-color: #82bf56;
    border-color: black;
    color: white;
}
.btn, .authentication__form input[type="submit"], .btn--inverted, .search__filters button, .btn--transparent, .btn--light, .modal__backdrop .dialog__close, .delete__dialog button, .block-user__dialog button, .btn--outlined, .btn--ico, .btn--tab, .friend-noise-group button, .preference input[type="radio"] + label {
    border: 1px solid;
    font-size: 0.75rem;
    line-height: 1;
    padding: 1.02rem 1.75rem;
    text-align: center;
}
.btn, .authentication__form input[type="submit"], .btn--inverted, .search__filters button, .btn--transparent, .btn--light, .modal__backdrop .dialog__close, .delete__dialog button, .block-user__dialog button, .btn--outlined, .btn--ico, .btn--tab, .dialog__close, .friend-noise-group button, .asset__btn, .preference input[type="radio"] + label, .comment__actions button, .emoji-time button, .text__tool, .region__tool, .featurebar button, .headerbar-proxy.headerbar-changer .file-browse-btn, .headerbar-proxy .headerbar-proxy__arrow, .toolbar__toggle {
    border: 0 none;
    border-radius: 0;
    color: inherit;
    display: inline-block;
    font: inherit;
    margin: 0;
    outline: 0 none;
    text-transform: none;
}
button, html input[type="button"], input[type="reset"], input[type="submit"] {
    cursor: pointer;
}
input, textarea {
    -moz-appearance: none;
    border-radius: 0;
    color: inherit;
    font: inherit;
    margin: 0;
}
</style>
</head>
<body class="hootpile" role="document">
<div id="main" class="main_authentication" role="main">
<header class="authentication__header">
<a href="/">
<img src="http://www.hootpile.com/images/logo.png" alt="Hootpile">
</a>
<h1>Interact with thousands of VITians.</h1>
</header>
<div id="authentication_view">
<form id="new_user" class="simple_form authentication__form js-new-session-form" role="form" novalidate="novalidate" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" accept-charset="UTF-8" autocomplete="off">
<fieldset class="form__fieldset fieldset--no-label">
<div class="form__group email optional user_email">
<input id="user_email" class="string email required form__control" type="text" value="" autofocus="autofocus" required="required" placeholder="Your Name" name="name">
</div>
<div class="form__group email optional user_email">
<input id="user_email" class="string email required form__control" type="email" value="" required="required" placeholder="Enter VIT email ( @vit.ac.in)" name="email">
</div>
<div class="form__group email optional user_email">
<input id="user_email" class="string email required form__control" type="text" value="" autofocus="autofocus" required="required" placeholder="Username" name="username">
</div>
<div class="form__group password required user_password">
<input id="user_password" class="password required form__control" type="password" placeholder="Enter password" name="password">
</div>
</fieldset>
<footer class="form__actions">
<input class="" type="submit" value="Register" name="reg">
</footer>
</form>
</div>
</div>
</body>
</html>