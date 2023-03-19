    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
  <script src="./cesar525_likebutton/likes.js"></script>
<?php include("cesar525_likebutton/engine/init.php"); ?>


<?php 

$user_id = 123; // setup the logged in user id example: $_SESSION['user_id] 
//Checking for reactions
$checking_react = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE like_by_user_id='$user_id' AND like_post_id='$post_id'", $conn);
if($checking_react){
$row = mysqli_fetch_assoc($checking_react);
$current = $row['like_type'];
}else{
echo 'not working';
}
if(mysqli_num_rows($checking_react) == 0){
$current = 0;
};


?>



<!-- EMOJI BUTTON -->
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


    <!-- MODAL -->
<style>
.clicking-userName {
    color: white;
    position: relative;
    right: 0px;
    transition: right ease 0.5s;
}

.clicking-userName:hover {
    color: yellow;
    cursor: pointer;
    right: -15px;
}
</style>
    <div id="id01<?php echo $post_id;?>" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="border-radius: 0;background-color: #090909;border: solid 1px #47474721;">
        <header style="background-color: #1a1a1a;border-radius: 0px;height: 20px;border: solid 1px #383838;">
            <span style="display:inline-block;"
                onclick="document.getElementById('id01' + <?php echo $post_id ?>).style.display='none'"
                class="w3-button w3-large w3-display-topright">&times;</span>
            <div style="display:inline-block;width: 97%;">
                <center>
                    <font>Who reacted to this?</font>
                </center>
            </div>
        </header>
        <div class="w3-container">
            <div style="padding: 11px;">

                <?php

$checking_theLikes = query("SELECT like_type, like_by_user_id, like_post_id 
FROM likes_storage 
WHERE like_post_id='$post_id'", $conn);
if(!$checking_theLikes){
  echo 'not working';

}else{



  echo '<div style="margin-bottom: -29px;padding: 21px;font-size: 31px;font-family: anton;color: orange;margin-top: -29px;">Reactions</div>';
echo'<hr style="color: #d3d3d324;">';
  if(mysqli_num_rows($checking_theLikes) == 0){
  echo '<center><font>There is no reaction at this moment.</font></center>';
}
while($row_reactions = mysqli_fetch_assoc($checking_theLikes)){ 
//getting usernames from who every reacted to the post
$user_id = $row_reactions['like_post_id'];

$getting_user_names  = query($nothing, $conn);
if(!$getting_user_names){
    echo 'ERROR, Not Working SQL Query!';
    $user_name = 134;
}else{
    $rows_account = mysqli_fetch_assoc($getting_user_names);
$user_name = $rows_account[$config['user_names_colum_name']];
}
?>
                <div>
                    <div style="display:inline-block;"><img style="width: 30px;height: 30px;"
                            src="<?php echo $emojis_path[$row_reactions['like_type']]; ?>" alt=""></div>
                    <div style="display:inline-block;">
                        <font class="clicking-userName"
                            style="font-size: 20px;margin: 11px;font-family: anton;position: relative;bottom: 9px;">
                        <?php echo $user_name;?></font>
                    </div>
                </div>


                <?php
 }
}
?>
            </div>
        </div>
    </div>
</div>