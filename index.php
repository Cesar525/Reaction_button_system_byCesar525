<?php 
include("cesar525_likebutton/header.php");


//important to add headers
include("cesar525_likebutton/engine/init.php");
?>

<?php  
$post_count = 4;
$user_id = 33;
for($counting_post = 0; $counting_post < $post_count; $counting_post++){// while loop
?>
<?php
REACT_BUTTON($counting_post, $user_id, "SELECT user_id , user_name FROM account",  $conn);
?>


<?php } 

?>
<?php include("cesar525_likebutton/footer.php");?>