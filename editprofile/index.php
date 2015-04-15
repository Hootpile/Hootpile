<?php
$conn = mysqli_connect("localhost","rahulkapoor28","Rahulkapoor!28","subscribers");
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

$post = @$_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = $user;
$user_posted_to = $user;

$sqlCommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";  
$query = mysqli_query($conn,$sqlCommand) or die (mysql_error()); 

}
?>
<?php
 $get_info = mysqli_query($conn,"SELECT email,name,username FROM users2 WHERE username='$user'");
  $get_row = mysqli_fetch_assoc($get_info);
  $email = $get_row['email'];
  $name  = $get_row['name'];
  $username = $get_row['username'];
?>
<?php
  $senddata = @$_POST['basic'];

  //Password variables
  $gender = strip_tags(@$_POST['gender']);
  $birthday = strip_tags(@$_POST['birthday']);
  $relation = strip_tags(@$_POST['relation']);

  if ($senddata) {
  //If the form has been submitted ..
        //Check whether old password equals $db_password
            if (strlen($birthday) <= 4) {
             echo "Sorry! Birthday is not right! Try entering it in DD/MM/YYYY format.";
            }
            else if(empty($birthday)){
            echo "Please enter your Birthday";
            }
            else
            {
           $update_query = mysqli_query($conn,"UPDATE users SET gender='$gender', birthday='$birthday',relation='$relation' WHERE username='$user'");
           echo "Success! Your basic information has been updated!";

            }
         }
         else
         {
         }
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

.SettingsMain .section_title {
    border-bottom: 2px solid #e2e2e2;
    font-weight: bold;
    margin-bottom: 0;
    padding-bottom: 8px;
}
strong {
    font-weight: bold;
}
.SettingsMain .settings_border {
    border-bottom: 1px solid #e2e2e2;
}

.SettingsMain .settings_section .settings_row::before, .SettingsMain .settings_section .settings_row::after {
    content: "";
    display: table;
}
.SettingsMain .settings_section .settings_row::after {
    clear: both;
}
.SettingsMain .settings_section .settings_row::before, .SettingsMain .settings_section .settings_row::after {
    content: "";
    display: table;
}
input[type="text"], input[type="number"], input[type="password"]{
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #ccc;
    border-radius: 2px;
    width: 220px;
    height:20px;
    padding:0px 12px;
    box-shadow: 0 1px 1px rgba(200, 200, 200, 0.3) inset;
    box-sizing: border-box;
    min-height: 27px;
    outline: 0 none;
    transition: border-color 0.2s ease 0s;
	margin-left:10px;
}
textarea {

}
input[type="submit"] {
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
.info {
    color: #262626;
    display: inline-block;
}
</style>
</head>
<body>
<div id="featurebar" class="featurebar">
<p class="featurebar__links">
<span>Hootpile Beta</span>
<a class="fb_link" href="/home.php">Home</a>
<a class="fb_link" href="/<?php echo $username ?>"><?php echo $name; ?></a>
<a class="fb_link" href="/Settings">Settings</a>
<a class="fb_link" href="/logout.php">Logout</a>
</p>
</div><br><br><br>
<div class="div_left">
<a href="/">
<img src="/images/small.png" width="140px" height="" style="" alt="Hootpile">
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
<p>Fill up these details, so that VITians can easily reach you. Tell people about yourself, what you achieved, your skills<br>
Your Interests and as many things as you can.</p>
<div style="width:50%; float:right;">
<p class="section_title">
<strong>Edit Profile</strong>
</p>
<p>Upload Profile Photo:</p>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="profilepic" /><br><br>
<input type="submit" name="uploadpic" value="Change Profile Photo">
</form>
<p>Upload Cover Photo:</p>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="profilepic" /><br><br>
<input type="submit" name="uploadpic" value="Change Cover">
</form>
<p>Links</p>
<strong>Hootpile URL</strong>
<p>hootpile.com/<?php echo $user; ?></p>
<form action="" method="post">
<p>Facebook Profile</p>
<input type="text" placeholder="facebook URL"></input>
<p>Twitter Profile</p>
<input type="text" placeholder="Twitter URL"></input>
<p>Any other Profile</p>
<input type="text" placeholder="Eg: On CodeChef, HackerRank"></input>
</form><br><br>
<strong>Contact Information</strong>
<p>How can VITians contact You?</p>
<form action="" method="post">
<p>Block & Room No. In which you live</p>
<input type="text" placeholder="Eg: M-Block 907"></input>
<input type="text" placeholder="Mobile No."></input>
<input type="text" placeholder="Home Address "></input>
</form>
</div>
<div class="width:50%;float:left;">
<strong>About <?php echo $name; ?></strong><br>
<br>
<p>Basic Information</p>
<form action=""  method="post">
<p>Gender:</p><input type="radio" value="Male" name="gender">Male</input>
<input type="radio" value="Female" name="gender">Female</input><br>
<p>Birthday :</p>
<input type="text" placeholder="Help VITians to wish you."></input><br>
<p>Relationship :</p>
<select name="relation">
<option value="I don't want to say">I dont want to say</option>
<option value="Single">Single</option>
<option value="In a Relationship">In a Relationship</option>
</select><br><br>
<input type="submit" name="basic" value="Submit"></input>
</form><br><br>
<strong>Tell VITians about Yourself.</strong><br>
<b>Story</b>
<form action="" method="post">
<p>Tagline</p>
<input type="text" placeholder="A brief description of you"></input>
<p>Introduction</p>
<p>Put a little about yourself here so people know <br>theyve found the correct <?php echo $name; ?>.</p>
<textarea placeholder="" rows="4" cols="30"></textarea>
<p>Branch<br>In which Branch are You?</p>
<input type="text" placeholder="Eg: CSE, Mechanical etc."></input>
<p>Anything to Brag About?</p>
<textarea placeholder="Examples: survived high school, Made Awesome Android App, etc." rows="4" cols="30"></textarea>
<p>Member in any Chapter, Group etc.<br>If yes, Enter the Group Name here.</p>
<input type="text"></input>
</form>
<br><br>
</div>

</div>
</body>
</html>