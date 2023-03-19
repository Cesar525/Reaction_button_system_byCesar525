<?php


function query($sql, $conn){
    $result_of_query = mysqli_query($conn, $sql);
    if($result_of_query){
        return $result_of_query;
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

function countingPostReactions($post_id, $conn){
    $coutning_total_react = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE  like_post_id='$post_id'", $conn);
if($coutning_total_react){
    
    if(mysqli_num_rows($coutning_total_react) == 0){
        $react_count = 0;
    return $react_count;
    }else{
        $react_count = mysqli_num_rows($coutning_total_react);
       return $react_count;
    }
}
}


// this function need more work 
function likeMessage($post_id, $user_id, $conn){

$checking_for_likes = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE  like_post_id='$post_id'", $conn);
$checking_for_likesUser = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE  like_by_user_id='$user_id' AND like_post_id='$post_id'", $conn);
//variables
$like_by_me_only = false;
$like_by_one_user_only = false;
$no_likes_yet = false;
$like_more_than_one_but_me = false;
$like_by_me_and_more_users = false;
$me_and_one_user_reacted_to_it = false;

if($checking_for_likesUser){
 //   echo'Working1';
$reacted_by_user = mysqli_num_rows($checking_for_likesUser); 

}else{
   // echo'not working';
}

if($checking_for_likes){
 //  echo 'Workin2';
$row = mysqli_fetch_assoc($checking_for_likes);
$count_likes_by_others = mysqli_num_rows($checking_for_likes);
}else{
  //  echo 'not working';
}


if($count_likes_by_others == 0){
    if($reacted_by_user == 0){
        $no_likes_yet = true;
    }
   }

if ($count_likes_by_others == 1){
    if($reacted_by_user == 0) {
        $like_by_one_user_only = true;
    }
}
if($count_likes_by_others > 1){
    if($reacted_by_user == 0){
    $like_more_than_one_but_me = true;
    }
}
if($count_likes_by_others == 1){
    if($reacted_by_user == 1){
        $like_by_me_only = true;
    }
}
if($count_likes_by_others > 2){
    if($reacted_by_user == 1){
        $like_by_me_and_more_users = true;
    }
}
if($count_likes_by_others == 2){
    if($reacted_by_user == 1){
        $me_and_one_user_reacted_to_it = true;
    }
}

    if($like_by_one_user_only){ // others react toit but you
    echo $count_likes_by_others. ' user reacted to this.'; // done works
    }
    if($like_by_me_only){ // when you are the only first one reacting to it.
        echo ' You reacted to this.';   // done works
    }
    if($like_more_than_one_but_me){ // done works
        echo $count_likes_by_others . ' users reacted to this.';
    }
    if($no_likes_yet){ // woks
        echo' No reaction yet';
    }
    if($like_by_me_and_more_users){
        echo 'you and '. ($count_likes_by_others - 1) .' others reacted to this';
    }
    if($me_and_one_user_reacted_to_it){
        echo'you and another user reacted to this'; 
    }  
}

function REACT_BUTTON($post_id, $user_id_, $accound_query_, $account_user_name_colomn,  $conn){
// variables needed
$post_id_ = $post_id;
$user_id = $user_id_;
if(isset($account_query_)){
$account_query = $account_query_;
}else{
    $account_query = "There is no SQL";
}


$emojis_reaction = [
    "<div><img class='emojis-button' style='width:10px;' src='cesar525_likebutton/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525_likebutton/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'><font class='glow'> Liked</font></font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525_likebutton/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
   "<div><img class='emojis-button' style='width:10px;' src='cesar525_likebutton/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525_likebutton/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
   "<div><img class='emojis-button' style='width:10px;' src='cesar525_likebutton/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525_likebutton/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Sad</font></div>"
];
$example_images = array(
    "cesar525_likebutton/imgs/planet.jpg",
    "cesar525_likebutton/imgs/moon.jpg"
);
// emojis downloaded at https://getemoji.com/
$emojis_path = [
"cesar525_likebutton/emojis/thumbsup.png",
"cesar525_likebutton/emojis/thumbsup.png",
"cesar525_likebutton/emojis/love.png",
"cesar525_likebutton/emojis/openmouth.png",
"cesar525_likebutton/emojis/angry.png",
"cesar525_likebutton/emojis/laughing.png",
"cesar525_likebutton/emojis/sad.png",
];



$checking_react = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE like_by_user_id='$user_id' AND like_post_id='$post_id'", $conn);
if($checking_react){
$row = mysqli_fetch_assoc($checking_react);
$current = $row['like_type'];
//echo 'not working';
}else{
}
if(mysqli_num_rows($checking_react) == 0){
$current = 0;
};

##############

//CONTENT STARTS HERE ########################## ALL THIS WILL GO INSIDE THE WHILE LOOP UNTIL THE END OF THE CONTENT
//setup the post id example $row['post_id'] from database

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

<!-- MODAL -->
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
$user_id = $row_reactions['like_by_user_id'];// people reacted to this post.

$getting_user_names  = query($account_query , $conn);
if(!$getting_user_names){
    echo 'ERROR, Not Working SQL query or not set.';
    $user_name = "default with user ID = " . $user_id;
}else{
    $rows_account = mysqli_fetch_assoc($getting_user_names);
$user_name = $rows_account[$account_user_name_colomn];
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

<?php
} 

?>