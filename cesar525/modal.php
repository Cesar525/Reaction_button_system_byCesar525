<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="cesar525/modal_style.css">

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
    <div class="w3-modal-content w3-card-4" style="border-radius: 0;background-color: #090909;border: ;">
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

                <!-- <font>Post id = <?php //echo $post_id; ?> </font> -->
                <!-- checking for likes -->
                <?php
$checking_theLikes = query("SELECT like_type, like_by_user_id, like_post_id 
FROM likes_storage 
WHERE like_post_id='$post_id'", $conn);
if(!$checking_theLikes){
  echo 'not working';

}else{
  echo '<div style="padding: 21px;font-size: 31px;font-family: anton;color: orange;">Reactions</div>';
if(mysqli_num_rows($checking_theLikes) == 0){
  echo '<center><font>There is no reaction at this moment.</font></center>';
}
while($row_reactions = mysqli_fetch_assoc($checking_theLikes)){ ?>
                <div>
                    <div style="display:inline-block;"><img style="width: 30px;height: 30px;"
                            src="<?php echo $emojis_path[$row_reactions['like_type']]; ?>" alt=""></div>
                    <div style="display:inline-block;">
                        <font class="clicking-userName"
                            style="font-size: 20px;margin: 11px;font-family: anton;position: relative;bottom: 9px;">
                            userName <?php echo $row_reactions['like_by_user_id'];?></font>
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