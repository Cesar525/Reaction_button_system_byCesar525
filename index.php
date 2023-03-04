<?php 
include("cesar525/header.php");
include("cesar525/engine/init.php");

?>



<style>
.like-main-container {
    background-color: #0d0d0d;
    padding: 11px;
    border-radius: 11px;
    width: 310px;
}

.like-button {

    color: white;
    padding: 4px;
    width: 81px;
    border: solid 1px gray;
    cursor: pointer;
    border-radius: 11px;
}

.like-button-effect {
    background-color: black;
    transition: background-color ease 0.3s;
}

.like-button-effect:hover {
    background-color: #3e3b3b;
}

.emojis-container {
    display: none;
    color: red;
    background-color: #666666;
    width: fit-content;
    height: fit-content;
    border: 1px solid gray;
    position: absolute;
    max-width: 400px;
    padding-left: 6px;
    border-radius: 3px;
    animation: fadeIn 0.3s;

}

.emojis-container:hover {
    display: block;
}

.like-button:hover+.emojis-container {
    display: block;
}

.emojis-button {
    padding: 3px;
    width: 21px;
    margin-bottom: -4px;
    margin-left: -2px;
    border: solid 1px #6d6d6d00;
    margin-right: 6px;
    border-radius: 9px;
    background-color: transparent;
    transition: background-color ease 0.3s;
}

.emojis-button:hover {
    background-color: #35333369;
    cursor: pointer;
}

.click-to-check-likes {
    color: #b5b5b5;
    transition: color ease 0.3s;
}

.click-to-check-likes:hover {
    color: #c78e54;
    cursor: pointer;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
</style>

<?php
$emojis_path = array(
    "cesar525/emojis/thumbsup.png",
    "cesar525/emojis/thumbsup.png",
    "cesar525/emojis/love.png",
    "cesar525/emojis/openmouth.png",
    "cesar525/emojis/angry.png",
    "cesar525/emojis/laughing.png",
    "cesar525/emojis/sad.png"
);
$example_images = array(
    "cesar525/imgs/planet.jpg",
    "cesar525/imgs/moon.jpg"
);


$emojis_reaction = array(
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Like</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Wow</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Angry</font></div>" ,
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Haha</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
);

$amount_of_post = 2;
for($counting_post = 0; $counting_post < $amount_of_post; $counting_post++){
$post_id = $counting_post;
$user_id = 132;
?>
<div>
    <div style="margin: 0 auto;width: 360px;background-color: #ff000000;">
        <font color="white"><?php echo 'Post = '.$post_id;   ?></font>
        <?php
// checking for likes
$result_checking = query ("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE like_by_user_id='$user_id' AND like_post_id='$post_id'", $conn);
if($result_checking){
    //echo'working';
    if(mysqli_num_rows($result_checking) == 0){
        echo '<font color="white"> not found</font>';
        $current_react = 0;
    }else{
        echo '<font color="white"> found</font>';
$row_likes = mysqli_fetch_assoc($result_checking);
$current_react = $row_likes['like_type'];
    }
}
?>
        <div
            style="background-color: #1c1c1c;padding: 11px;border: solid 1px #575757;border-radius: 14px;margin-bottom: 11px;width: 341px;">
            <!-- <center><img style="width: 241px;" src="<?php echo $example_images[$post_id]; ?>" alt=""> </center> -->

            <hr style="width: 339px;border: 1px solid #454444;">
            <div class="like-main-container">
                <button id="<?php echo $post_id; ?>showemojis" onclick="changeCurrent(this, <?php echo $post_id; ?>)"
                    style="display:inline-block;" class="like-button like-button-effect"
                    data-current-<?php echo $post_id;?>="<?php echo $current_react; ?>"><?php echo $emojis_reaction[$current_react]; ?></button>


                <!-- emojis selection -->
                <div id="<?php echo $post_id; ?>selecting_emoji" class="emojis-container">
                    <?php
for($counting = 1; $counting < count($emojis_path); $counting++){ 
    ?>
                    <img id="<?php echo $post_id; ?>emojiSelection" onclick="reactionProccessing(this)"
                        data-user-id="<?php echo $user_id;?>" class="emojis-button"
                        src="<?php echo $emojis_path[$counting]; ?>" alt="" data-emoji-type="<?php echo $counting; ?>"
                        data-current-emoji="<?php echo $current_react; ?>">
                    <?php }?>
                </div>
                <!-- //counting reactions -->
                &nbsp; <span class="click-to-check-likes">You like This and 20 others</span>


                <!-- result data show here -->
            </div>
            <div id="one<?php echo $post_id;?>">data here</div>
        </div>
        <?php
};
?>
    </div>
    <?php include("cesar525/footer.php");?>