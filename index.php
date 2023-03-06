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
    width: 198px;

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
$emojis_reaction = [
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Liked</font></div>",
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
        
        $user_id = 123;
        $post_count = 3;
        for($counting_post = 0; $counting_post < $post_count; $counting_post++){
            $post_id = $counting_post;
//Checking for reactions
$checking_react = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE like_by_user_id='$user_id' AND like_post_id='$post_id'", $conn);
if($checking_react){
    $row = mysqli_fetch_assoc($checking_react);
    $current = $row['like_type'];
}else{
    echo 'not working';
}
        ?>
<div
    style="background-color: #1c1c1c;padding: 11px;border: solid 1px #575757;border-radius: 14px;margin-bottom: 11px;width: 341px;">

    <hr style="width: 339px;border: 1px solid #454444;">

    <div class="like-main-container">
        <!-- showing emijs -->
        <button id="showemojis<?php echo $post_id;?>" onclick="likeUnlike()" style="display:inline-block;"
            class="like-button like-button-effect">
           <?php// echo $emojis_reaction[$current]; ?>
            <div id="one<?php echo $post_id;?>"></div>
        </button>


        <!-- emojis selection -->
        <div id="selectingContainer" class="emojis-container">
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
        &nbsp; <span class="click-to-check-likes">You like This and 20 others</span>


        <!-- result data show here -->
    </div>
</div>

<?php } ?>
<?php include("cesar525/footer.php");?>