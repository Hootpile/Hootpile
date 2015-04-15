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
  $senddata = @$_POST['senddata'];

  //Password variables
  $old_password = strip_tags(@$_POST['oldpassword']);
  $new_password = strip_tags(@$_POST['newpassword']);
  $repeat_password = strip_tags(@$_POST['newpassword2']);

  if ($senddata) {
  //If the form has been submitted ...

  $password_query = mysqli_query($conn,"SELECT * FROM users WHERE username='$user'");
  while ($row = mysqli_fetch_assoc($password_query)) {
        $db_password = $row['password'];
        
        //md5 the old password before we check if it matches
        $old_password_md5 = md5($old_password);
        
        //Check whether old password equals $db_password
        if ($old_password_md5 == $db_password) {
         //Continue Changing the users password ...
         //Check whether the 2 new passwords match
         if ($new_password == $repeat_password) {
            if (strlen($new_password) <= 4) {
             echo "Sorry! But your password must be more than 4 character long!";
            }
            else
            {

            //md5 the new password before we add it to the database
            $new_password_md5 = md5($new_password);
           //Great! Update the users passwords!
           $password_update_query = mysqli_query($conn,"UPDATE users SET password='$new_password_md5' WHERE username='$user'");
           echo "Success! Your password has been updated!";

            }
         }
         else
         {
          echo "Your two new passwords don't match!";
         }
        }
        else
        {
         echo "The old password is incorrect!";
        }
  }
   }
  else
  {
   echo "";
  }
?>
<?php
//Check whether the user has uploaded a profile pic or not
  $check_pic = mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user'");
  $get_pic_row = mysqli_fetch_assoc($check_pic);
  $profile_pic_db = $get_pic_row['profile_pic'];
  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  }
  //Profile Image upload script
  if (isset($_FILES['profilepic'])) {
   if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576)) //1 Megabyte
  {
   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   $rand_dir_name = substr(str_shuffle($chars), 0, 15);
   mkdir("userdata/profile_pics/$rand_dir_name");

   if (file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
   {
    echo @$_FILES["profilepic"]["name"]." Already exists";
   }
   else
   {
    move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
    //echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
    $profile_pic_name = @$_FILES["profilepic"]["name"];
    $profile_pic_query = mysqli_query($conn,"UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
    header("Location: hootpile/Settings");
    
   }
  }
  else
  {
      echo "Invailid File! Your image must be no larger than 1MB and it must be either a .jpg, .jpeg, .png or .gif";
  }
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
input[type="text"], input[type="password"] {
    height: 15px;
    padding: 3px;
    width: 150px;
}
input[type="text"], input[type="number"], input[type="password"], textarea {
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-shadow: 0 1px 1px rgba(200, 200, 200, 0.3) inset;
    box-sizing: border-box;
    min-height: 27px;
    outline: 0 none;
    transition: border-color 0.2s ease 0s;
	margin-left:30px;
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
<p class="section_title">
<strong>Account</strong>
</p>
<p>Primary Email<p>
<strong><?php echo $email; ?></strong>
<p>Password</p>
<form action="" method="post">
<label>Your Old Password:</label> <input type="password" name="oldpassword" id="oldpassword"><br><br>
<label>Your New Password: <label><input type="password" name="newpassword" id="newpassword"><br><br>
<label>Repeat Password :  </label><input type="password" name="newpassword2" id="newpassword2"><br><br>
<input type="submit" name="senddata" id="senddata" value="Change Password">
</form>
<p>Upload Profile Photo:</p>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="profilepic" /><br><br>
<input type="submit" name="uploadpic" value="Upload Image">
</form>
</div>
</body>
</html>