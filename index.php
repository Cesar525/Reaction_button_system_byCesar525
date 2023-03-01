<?php 
include("cesar525/header.php");
include("cesar525/engine/init.php");

?>  



<style>
.like-main-container{
    background-color: #2e2d2d;
padding: 11px;
border-radius: 11px;
width: 351px;
}

.like-button{
    
    color: white;
    padding: 4px;
    width: 81px;
    border: solid 1px gray;
    cursor:pointer;
  }

.like-button-effect{
    background-color:black;
}

.like-button-effect:hover{
    background-color:#3e3b3b;
}

.emojis-container{
    display: none;
    color: red;
    background-color: #666666;
    width: fit-content;
    height: fit-content;
    border: 1px solid gray;
    position:absolute;
    max-width:400px;
    padding-left:6px;
    border-radius: 3px;
   
}

.emojis-container:hover{
    display:block;
}

.like-button:hover + .emojis-container{
   display:block;
  }
.emojis-button{
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
.emojis-button:hover{
    background-color: #35333369;
    cursor:pointer;
}

</style>

<?php
$emojis_path = [
    "cesar525/emojis/thumbsup.png",
    "cesar525/emojis/love.png",
    "cesar525/emojis/openmouth.png",
    "cesar525/emojis/angry.png",
    "cesar525/emojis/laughing.png",
    "cesar525/emojis/sad.png"
    ];

$emojis_reaction = array(
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Wow</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Angry</font></div>" ,
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Haha</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
);

$amount_of_post = 2;
for($counting_post = 0; $counting_post < $amount_of_post; $counting_post++){
$post_id = $counting_post;

?>
<div style="background-color:white;padding: 11px;">
    <?php echo $post_id;   ?>
<div class="like-main-container">
    <span style="color:white">You like This and 20 others</span><br><hr>
   
    <button id="<?php echo $post_id; ?>showemojis" onclick="current(this, <?php echo $post_id; ?>)" style="display:inline-block;" class="like-button like-button-effect" data-current-<?php echo $post_id;?>="2"><?php echo $emojis_reaction[0]; ?></button>

    <div id="<?php echo $post_id; ?>selecting_emoji" class="emojis-container">
<?php
for($counting = 0; $counting < count($emojis_path); $counting++){ ?>
    <img id="<?php echo $post_id; ?>emojiSelection" onclick="addingReaction(this, <?php echo $post_id; ?>)" class="emojis-button" src="<?php echo $emojis_path[$counting]; ?>"  alt="" data-emoji-<?php echo $post_id; ?>="<?php echo $counting; ?>">
<?php
}
?>
</div>
</div>
<div id="one<?php echo $post_id;?>" style="color:black;">data here</div>
</div>
<?php
};
?>

<?php include("layout/footer.php");?>

