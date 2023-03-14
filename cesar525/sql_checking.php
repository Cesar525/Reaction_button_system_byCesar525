<?php 
include("cesar525/config.php");

$user_id = $config['loggedin_useR_id']; 
//Checking for reactions
$checking_react = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE like_by_user_id='$user_id' AND like_post_id='$post_id'", $conn);
if($checking_react){
$row = mysqli_fetch_assoc($checking_react);

$current = $row['like_type'];
 //"You and ". countingPostReactions($post_id, $conn). " users reacted to this.";
}else{
echo 'not working';
}
if(mysqli_num_rows($checking_react) == 0){
$current = 0;
};


?>