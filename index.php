<?php 
include("cesar525/header.php");


//important to add headers
include("cesar525/engine/init.php");
?>

<?php  
         
        
        $post_count = 4;
        for($counting_post = 0; $counting_post < $post_count; $counting_post++){// while loop
        
//CONTENT STARTS HERE ##########################
    $post_id = $counting_post; //setup the post id
    include("cesar525/sql_checking.php"); 
    include("cesar525/modal.php");
   ?>
<div class="like-main-container">
    <!-- showing emijs -->
    <button id="showemojis<?php echo $post_id;?>"
        onclick="clickingToDelete(<?php echo $post_id;?> , <?php echo $user_id; ?>)"
        onmouseout="emojiWindowMouseOut(<?php echo $post_id;?>)" onmouseover="mouseovershow(<?php echo $post_id;?>);"
        style="display:inline-block;" class="like-button like-button-effect" data-post-id="<?php echo $post_id;?>"
        <?php echo 'data-current-'.$current.'='. $current; ?>">
        <?php echo $emojis_reaction[$current]; ?>
    </button>
    <div id="one<?php echo $post_id;?>" style="display:none;"></div>
<div id="two<?php echo $post_id;?>" style="display:none;"></div>
    <!-- emojis selection -->
    <div id="selectingContainer<?php echo $post_id;?>" onmouseout="emojiWindowMouseOut(<?php echo $post_id;?>)"
        onmouseover="mouseovershow(<?php echo $post_id;?>);" onclick="closeOnClick(<?php echo $post_id;?>);"
        class="emojis-container">
        <?php for($counting_emojis = 1; $counting_emojis < count($emojis_path); $counting_emojis++)
                        { 
                    echo '<img  
                            id="emojis-images"
                            class="emojis-button"
                            onclick="reactionProccess(this, '. $post_id .', '.$user_id.')" 
                            src="'.$emojis_path[$counting_emojis].'" 
                            alt=""
                            data-current-'.$post_id.'="'.$current.'"
                            data-emoji-'.$post_id.'="'.$counting_emojis.'">';
                        }
                ?>
        <!-- <img class="emojis-button" src="" alt=""> -->
    </div>
    <!-- //counting reactions -->
    &nbsp; <span id="like_message<?php echo $post_id;?>" class="click-to-check-likes"
        onclick="document.getElementById('id01' + <?php echo $post_id;?>).style.display='block';"><?php echo likeMessage($post_id, $user_id, $conn); ?></span>
    </div>
<!-- //CONTENT ENDS HERE ########################## -->



<?php } 

?>
<?php include("cesar525/footer.php");?>