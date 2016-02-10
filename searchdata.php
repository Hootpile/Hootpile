<?php
include('config.php');
if(isset($_GET['search_word']))
{
$search_word=$_GET['search_word'];
$search_word_new=mysql_escape_string($search_word);
$search_word_fix=str_replace(" ","%",$search_word_new);
$sql=mysql_query("SELECT * FROM messages WHERE msg LIKE '%$search_word_fix%' ORDER BY mes_id DESC LIMIT 20");
$count=mysql_num_rows($sql);
if($count > 0)
{
while($row=mysql_fetch_array($sql))
{

$msg=$row['msg'];
$bold_word='<b>'.$search_word.'</b>';
$final_msg = str_ireplace($search_word, $bold_word, $msg);
?>

<li><?php echo $final_msg; ?></li>

<?php
}
}
else
{
echo "<li>No Results</li>";
}
}
?>
