<?php 
include("cesar525/header.php");
include("cesar525/engine/init.php");

?>
    <link rel="stylesheet" href="cesar525/emoji_style.css">

<?php
$emojis_reaction = [
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'><font class='glow'> Liked</font></font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
   "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
   "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
];
$example_images = array(
    "cesar525/imgs/planet.jpg",
    "cesar525/imgs/moon.jpg"
);
// emojis downloaded at https://getemoji.com/
$emojis_path = [
"cesar525/emojis/thumbsup.png",
"cesar525/emojis/thumbsup.png",
"cesar525/emojis/love.png",
"cesar525/emojis/openmouth.png",
"cesar525/emojis/angry.png",
"cesar525/emojis/laughing.png",
"cesar525/emojis/sad.png",
];

?>

<?php  
        
        
        $post_count = 6;
        for($counting_post = 0; $counting_post < $post_count; $counting_post++){
            include("cesar525/sql_checking.php");
            ?>
<div
    style="background-color: #1c1c1c;padding: 11px;border: solid 1px #575757;border-radius: 14px;margin-bottom: 11px;width: 341px;">

    <hr style="width: 339px;border: 1px solid #454444;">

    <div class="like-main-container">
        <!-- showing emijs -->
        <button id="showemojis<?php echo $post_id;?>" onclick="clickingToDelete(<?php echo $post_id;?> , <?php echo $user_id; ?>)" onmouseout="emojiWindowMouseOut(<?php echo $post_id;?>)" onmouseover="mouseovershow(<?php echo $post_id;?>);" style="display:inline-block;"
            class="like-button like-button-effect"
            data-post-id="<?php echo $post_id;?>">
           <?php echo $emojis_reaction[$current]; ?>
        </button>


        <!-- emojis selection -->
        <div id="selectingContainer<?php echo $post_id;?>" onmouseout="emojiWindowMouseOut(<?php echo $post_id;?>)" onmouseover="mouseovershow(<?php echo $post_id;?>);" onclick="closeOnClick(<?php echo $post_id;?>);" class="emojis-container">
            <?php for($counting_emojis = 1; $counting_emojis < count($emojis_path); $counting_emojis++){ 
                echo '<img  id="emojis-images"
                            class="emojis-button"
                            onclick="reactionProccess(this, '. $post_id .', '.$user_id.')" 
                            src="'.$emojis_path[$counting_emojis].'" 
                            alt=""
                            data-emoji-'.$post_id.'="'.$counting_emojis.'">';
            }
                ?>
            <!-- <img class="emojis-button" src="" alt=""> -->

        </div>

        <!-- //counting reactions -->
        &nbsp; <span class="click-to-check-likes"><?php echo likeMessage($post_id, $user_id, $conn); ?></span>


        <!-- result data show here -->
    </div>
    <div id="one<?php echo $post_id;?>"></div>

</div>

<?php } ?>
<?php include("cesar525/footer.php");?>