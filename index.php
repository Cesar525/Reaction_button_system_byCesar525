<!-- this one made only to show off the project
this project was built to help developers speed up 
their projects need a like or react button system?
here it is. if ther is any issue please post it on the issues section.
-->

<?php 
// ADD this
include("cesar525_likebutton/header.php");
include("cesar525_likebutton/engine/init.php");
// ?>

<?php
// <!-- Array of images for example only -->
$images_for_examples = [
    "cesar525_likebutton/imgs/moon.jpg",
    "cesar525_likebutton/imgs/planet.jpg"
]
// working on to be containued
?>
<!-- Then use the function to display te button but first fill up the paremeters. -->
<?php  
$post_count = 1;
$user_id = 33;
for($counting_post = 0; $counting_post < $post_count; $counting_post++){// while loop
    ?>
<div
    style="background-color:#1c1b1b;margin: 0 auto;width: 331px;padding: 11px;border-radius: 11px;border: solid 1px #ffffff45;">
    <div style="padding-bottom: 10px;">
        <img src="<?php echo $images_for_examples[$counting_post]; ?>" style="width: 331px;max-height: 500px;" alt="">
    </div>
    <div>
        <?php
    REACT_BUTTON($counting_post, $user_id, "SELECT user_id, user_name FROM account","user_name", "user_id",  $conn);
?>
    </div>
</div>

<?php
 } 
 ?>



<!-- EXAMPLE:
//REACT_BUTTON($post_id, user_id( who ever is logged in), accounts query account tot detect users, find user name in account to display their names, $conn) -->

<?php include("cesar525_likebutton/footer.php");?>