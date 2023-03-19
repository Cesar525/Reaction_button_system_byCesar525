please follow the instruction on the instruction sheet.
or webforum.

<?php 
// ADD this
include("cesar525_likebutton/header.php");
include("cesar525_likebutton/engine/init.php");
// ?>

<?php
<!-- Array of images for example only -->
$images_for_examples = [
    "image_one",
    "image_two"
]
// working on to be containued
?>
<!-- Then use the function to display te button but first fill up the paremeters. -->
<?php  
$post_count = 4;
$user_id = 33;
for($counting_post = 0; $counting_post < $post_count; $counting_post++){// while loop
    ?>
    <div style="background-color:#1c1b1b;margin: 0 auto;width: 331px;padding: 11px;border-radius: 11px;border: solid 1px #ffffff45;">


<div>
    <img src="cesar525_likebutton/imgs/moon.png" alt="">
</div>
<div>
<?php
    REACT_BUTTON($counting_post, $user_id, "account Query","user_name_in_query",  $conn);
?>
</div>
</div>

<?php
 } 
 ?>



<!-- EXAMPLE:
//REACT_BUTTON($post_id, user_id( who ever is logged in), accounts query account tot detect users, find user name in account to display their names, $conn) -->

<?php include("cesar525_likebutton/footer.php");?>