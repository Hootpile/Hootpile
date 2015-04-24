<?php
$conn = mysqli_connect("localhost","","","subscribers");
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
$get_user_info = mysqli_query($conn,"SELECT profile_pic FROM users2 WHERE username='$user'");
                                                $get_info = mysqli_fetch_assoc($get_user_info);
                                                $profilepic_info3 = $get_info['profile_pic'];
                                                if ($profilepic_info3 == "") {
                                                 $profilepic_info3 = "http://www.hootpile.com/images/default_hootpile.png";
                                                }
                                                else
                                                {
                                                 $profilepic_info3 = "http://www.hootpile.com/userdata/profile_pics/".$profilepic_info3;
                                                }
                                                ?>
<?php
 $get_info = mysqli_query($conn,"SELECT * FROM users2 WHERE username='$user'");
  $get_row = mysqli_fetch_assoc($get_info);
  $bio2 = $get_row['bio'];
  $tagline2 = $get_row['tagline'];
  $school2 = $get_row['branch'];
   $member2 = $get_row['member'];
  $brag2 = $get_row['brag'];
  $facebook2 = $get_row['facebook'];
  $twitter2 = $get_row['twitter'];
  $other2 = $get_row['other'];
  $gender2 = $get_row['gender'];
  $birthday2 = $get_row['birthday'];
  $relation2 = $get_row['relation'];
  $block2 = $get_row['block'];
  $mobile2 = $get_row['mobile'];
  $address2 = $get_row['address'];
  $register2 = $get_row['register'];
?>
<?php
 $get_info = mysqli_query($conn,"SELECT gender,name FROM users2 WHERE username='$user'");
  $get_row = mysqli_fetch_assoc($get_info);
  $gender = $get_row['gender'];
  $name  = $get_row['name'];
?>
<?php
  $senddata = @$_POST['basic'];

  //Password variables
  $gender = strip_tags(@$_POST['gender']);
  $campus = strip_tags(@$_POST['campus']);
  $month = strip_tags(@$_POST['month']);
  $year = strip_tags(@$_POST['year']);
  $day = strip_tags(@$_POST['day']);
  $relation = strip_tags(@$_POST['relation']);

  if ($senddata) {
  //If the form has been submitted ..
        $update = mysqli_query($conn,"UPDATE `users2` SET `gender`='".$gender."', `campus`='".$campus."', `birthday`='$day/$month/$year',`relation`='".$relation."' WHERE `username`='".$user."'");
         $msg = "<div id=\"errormsg\">Basic Information has been updated.</div>";
         }
         else
         {
         }
?>
<?php
  $senddata = @$_POST['story'];

  //Password variables
  $tagline = strip_tags(@$_POST['tagline']);
  $intro = strip_tags(@$_POST['intro']);
  $branch = strip_tags(@$_POST['branch']);
  $school = strip_tags(@$_POST['school']);
 $brag = strip_tags(@$_POST['brag']);
  $member = strip_tags(@$_POST['member']);
 $register = strip_tags(@$_POST['register']);
  if ($senddata) {
        $update = mysqli_query($conn,"UPDATE `users2` SET `tagline`='".$tagline."', `bio`='".$intro."',`branch`='".$branch."', `brag`='".$brag."', `member`='".$member."',`register`='".$register."' WHERE `username`='".$user."'");
          $msg2 = "<div id=\"errormsg\">Your Story has been updated.</div>";
         }
         else
         {
         }
?>
<?php
  $senddata = @$_POST['links'];

  //Password variables
  $facebook = strip_tags(@$_POST['facebook']);
  $twitter= strip_tags(@$_POST['twitter']);
  $other = strip_tags(@$_POST['other']);
 
  if ($senddata) {
  
        $update = mysqli_query($conn,"UPDATE `users2` SET `facebook`='".$facebook."', `twitter`='".$twitter."',`other`='".$other."' WHERE `username`='".$user."'");
          $msg3 = "<div id=\"errormsg\">Links has been added in your profile.</div>";
         }
         else
         {
         }
?>
<?php
  $senddata = @$_POST['contact'];

  //Password variables
  $block = strip_tags(@$_POST['block']);
  $mobile = strip_tags(@$_POST['mobile']);
  $address = strip_tags(@$_POST['address']);
 
  if ($senddata) {
  
  //If the form has been submitted ..
if(!is_numeric($mobile)) {
      $errors[] = "Please provide a valid number";
   }
   else {
        $update = mysqli_query($conn,"UPDATE `users2` SET `block`='".$block."', `mobile`='".$mobile."',`address`='".$address."' WHERE `username`='".$user."'");
         $msg4 = "<div id=\"errormsg\">Contact information has been added.</div>";
         }}
         else
         {
         }
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Profile | Hootpile</title>
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
input[type="text"], input[type="number"], input[type="password"], input[type="url"]{
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #ccc;
    border-radius: 2px;
    width: 260px;
    height:40px;
    padding:0px 12px;
    box-shadow: 0 1px 1px rgba(200, 200, 200, 0.3) inset;
    box-sizing: border-box;
    min-height: 27px;
    outline: 0 none;
    transition: border-color 0.2s ease 0s;
	margin-left:10px;
}
#tagline {
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #ccc;
    border-radius: 2px;
    width: 300px;
    height:40px;
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
select {
    border: 1px solid #bdc7d8;
    font-size: 13px;
    height: 30px;
    padding: 5px;
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
}
.final-sell {
    margin-bottom: 0;
    text-align: center;
    width:350px;
}
.alert-success {
    background-color: #dff0d8;
    border-color: #dff0d8;
    color: #468847;
}
#errormsg {
background-color:#dff0d8;
 color: #800000;
border-color: #dff0d8;
padding: 6px 8px;
}
.alert {
padding:5px 7px;
}
h4 {
    font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight: 700;
    line-height: 2em;
}

#manifesto {
    color: black;
    text-decoration: underline;
}
#post_photo, .content > p, a {
    display: table-cell;
    vertical-align: middle;
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
<a class="fb_link" href="/<?php echo $user; ?>"><?php echo $name; ?></a>
<a class="fb_link" href="/Settings">Settings</a>
<a class="fb_link" href="/logout.php">Logout</a>
</p>
</div><br><br><br>
<div class="div_left">
<a href="/">
<img src="/images/small.png" width="140px" height="" style="" alt="Hootpile">
</a><br>
<a href="/faculty" id="manifesto">Faculty Information</a><br>
<a href="/editprofile" id="manifesto">Edit Profile</a>
<br>
<a href="https://docs.google.com/forms/d/1_KWStVBhPNeskXHdtzrdBn_b7nYF530V-zBiuhXow6o/viewform?usp=send_form"target="_blank" id="manifesto">Give Feedback</a><br>
<a href="#" id="manifesto" onclick="read();">Read the manifesto</a>
<br>
<div class="manifesto" style="height: auto;">
<p id="read"></p>
<div class="final-sell alert alert-success">
<h4 class="clean">
Fill up these details, so that VITians can easily reach you. Tell people about yourself,<br> what you achieved, your skills
Your Interests and as many things as you can.
</h4>
</div>
</div>
</div>
<script type="text/javascript">
function read(){
	document.getElementById('read').innerHTML="Hootpile is social utility that is <br>trying to transform how students at<br> VIT University connect wth each other.<br><br>Hootpile is free from advertising, <br>manipulation and exploitation.<br><br>While we realize this, we need your <br>support to spread the word. Share Hootpile's Manifesto on your social networks and <br>let's make this a great product. ";
}
</script>
</div>
<div class="div_right">
<br>
<div style="width:50%; float:right;">
<p class="section_title">
<div style="background-color: #EEEEF1; width:310px; padding:20px 30px">
<strong><img class="_51sw img" alt="" src="https://www.facebook.com/images/profile/timeline/app_icons/photos_24.png"> Photos</strong>
</p><hr>
<p>Upload Profile Photo:</p>
<img src="<?php echo $profilepic_info3; ?>" width="80"></img>
<form method="POST" enctype="multipart/form-data">
<input type="file" name="profilepic" id="profilepic"/><br><br>
<input type="button" name="uploadpic" onclick="uploadFile()" value="Change Profile Photo"><br>
<br>
<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>
<script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("profilepic").files[0];
	var formdata = new FormData();
	formdata.append("profilepic", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "http://www.hootpile.com/file_upload.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Profile Photo has been updated.";
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
</div><br><br>
<div style="background-color: #EEEEF1; width:310px; padding:20px 30px">
<p>Links</p>
<p style="font-size:12px;">Start with http in URL to add Profiles.</p><hr>
<?php echo $msg3; ?>
<strong>Hootpile URL</strong>
<p>hootpile.com/<?php echo $user; ?></p>
<form action="" method="post">
<p><img class="xfa" src="//s2.googleusercontent.com/s2/favicons?domain=www.facebook.com&alt=p" alt=""> Facebook Profile</p>
<input type="url" name="facebook" value="<?php echo $facebook2; ?>" placeholder="facebook URL"></input>
<p><img class="xfa" src="//s2.googleusercontent.com/s2/favicons?domain=www.twitter.com&alt=p" alt=""> Twitter Profile</p>
<input type="url" name="twitter" value="<?php echo $twitter2; ?>" placeholder="Twitter URL"></input>
<p>Any other Profile</p>
<p style="font-size:12px;">If you are from CSE, IT branch adding your profile URL on CodeChef, Codepen etc<br>lets people discover your work.</p>
<input type="url" name="other" value="<?php echo $other2; ?>" placeholder="Eg: On CodeChef, HackerRank"></input><br><br>
<input type="submit" name="links" value="Add Links"></input>
</form></div><br>
<div style="background-color: #EEEEF1; width:350px; padding:20px 30px">
<strong>Contact Information</strong><hr>
<?php echo $msg4; ?>
<p>How can VITians contact You ?</p>
<form action="" method="post">
<p style="font-size:12px;">Your contact details are always safe and encrypted in Hootpile, we respect your privacy.</p>
<input type="text" name="block" value="<?php echo $block2; ?>" placeholder="Eg: M-Block 907"></input><br>
<input type="text" name="mobile" value="<?php echo $mobile2; ?>" placeholder="Mobile No."></input><br>
<input type="text" name="address" value="<?php echo $address2; ?>" placeholder="Home Address "></input><br><br>
<input type="submit" name="contact" value="Add Contact Details"></input>
</form></div>
</div>
<div class="width:50%;float:left;">
<strong>About <?php echo $name; ?></strong><br>
<br>
<div style="background-color: #EEEEF1; width:330px; padding:20px 30px">
<p><img class="_51sw img" alt="" src="https://www.facebook.com/images/profile/timeline/app_icons/friends_24.png"> Basic Information</p>
<hr><?php echo $msg; ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
<p>Gender:</p>
<input type="radio" value="Male" name="gender">Male</input>
<input type="radio" value="Female" name="gender">Female</input><br>
<p> <img class="_51sw img" alt="" src="https://www.facebook.com/images/profile/timeline/app_icons/events_24.png"> Birthday :</p>
<select  title="Month" name="month" aria-label="Month">
<option selected="1" value="0">Month</option>
<option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select title="Day" name="day" aria-label="Day">
<option selected="1" value="0">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select title="Year" name="year" aria-label="Year">
<option selected="1" value="0">Year</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
</select>
<br>
<p>Campus:</p>
<input type="radio" value="Vellore" name="campus">Vellore</input>
<input type="radio" value="Chennai" name="campus">Chennai</input><br>
<p>Relationship :</p>
<select name="relation">
<option value="I don't want to say">I dont want to say</option>
<option value="Single">Single</option>
<option value="Engaged">Engaged</option>
<option value="Married">Married</option>
<option value="It's Complicated">Its Complicated</option>
<option value="In a Relationship">In a Relationship</option>
</select><br><br>
<input type="submit" name="basic" value="Submit"></input>
</form></div><br><br>
<strong>Story About <?php echo $name; ?></strong><br><br>
<div style="background-color: #EEEEF1; width:350px; padding:20px 30px">
<p> <img class="_51sw img" alt="" src="https://www.facebook.com/images/profile/timeline/app_icons/reviews_24x24.png"> Tell VITians About Yourself.</p><hr>
<?php echo $msg2; ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<p>Tagline</p>
<input type="text" name="tagline" value="<?php echo $tagline2; ?>" id="tagline" placeholder="A brief description of you"></input>
<p>Introduction</p><hr>
<p>Put a little information about yourself here so VITians know they have found the correct <?php echo $name; ?>.</p>
<textarea placeholder="" name="intro" rows="5" cols="40">
<?php echo $bio2; ?>
</textarea>
<p>Register No.</p><hr><br>
<input type="text" name="register" value="<?php echo $register2; ?>" placeholder="Eg: 13BIT0021"></input>
<p>School</p><hr><br>

<select name="branch">
<option value="School of Advanced Sciences ( SAS )">School of Advanced Sciences ( SAS )</option>
<option value="School of Bio Sciences and Technology ( SBST )">School of Bio Sciences and Technology ( SBST )</option>
<option selected="selected" value="School of Computing Science and Engineering ( SCSE )">School of Computing Science and Engineering ( SCSE )</option>
<option value="School of Electrical Engineering ( SELECT )">School of Electrical Engineering ( SELECT )</option>
<option value="School of Electronics Engineering ( SENSE )">School of Electronics Engineering ( SENSE )</option>
<option value="School of Information Technology and Engineering ( SITE )">School of Information Technology and Engineering ( SITE )</option>
<option value="School of Mechanical and Building Sciences ( SMBS )">School of Mechanical and Building Sciences ( SMBS )</option>
<option value="School of Social Science & Languages ( SSL )">School of Social Science & Languages ( SSL )</option>
<option value="VIT Business School ( VIT BS )">VIT Business School ( VIT BS )</option>
</select>
<p>Bragging Rights</p>
<p style="font-size:13px;">-An Amazing Achievement<br>
-Attaining something greatly desired by many people<br>
-An unfortunate event that can be viewed as positive for different reasons </p>
<textarea name="brag" placeholder="Eg: Awarded by Chancellor, Made Amazing Android App etc." rows="5" cols="40">
<?php echo $brag2; ?>
</textarea>
<p>Core Commitee Member in VIT</p>
<input type="text" name="member" value="<?php echo $member2; ?>" placeholder="Eg: IEEE, GDG etc."></input><br><br>
<input type="submit" name="story" value="Update my Story"></input>
</form></div>
<br><br>
</div>

</div>
</body>
</html>
