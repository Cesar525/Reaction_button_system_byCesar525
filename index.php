<?php include("layout/header.php");?>  
<style>
.like-button{
  background-color: black;
  color: white;
  padding: 4px;
  width: 81px;
  border: solid 1px gray;
  transition: background-color ease 0.3s;
}

.like-button:hover{
    background-color: rgb(48, 48, 48);
}

.emoji-content{
    background-color: white;
    border: solid 1px #3f3c3c;
    border-radius: 11pc;
    padding: 1px;
    width: 60%;
    position: relative;
    right: -19px;
}
.emoji-display{
  
    width: 31px;
    margin-bottom: -2px;
}

.show-emojis{
    background-color: blue;
}

.show-emojis:hover .emoji-content{
   background-color:red;
    }

</style>


<div style="background-color:white;padding: 11px;">

<div style="background-color: #1e1e49;width: 361px;padding: 6px;border-radius: 11px;">
<div class="emoji-content">
    <img class="emoji-display" src="emojis/thumbsup.png" alt="">
    <img class="emoji-display" src="emojis/love.png" alt="">
    <img class="emoji-display" src="emojis/laughing.png" alt="">
    <img class="emoji-display" src="emojis/sad.png" alt="">
    <img class="emoji-display" src="emojis/angry.png" alt="">
    <img class="emoji-display" src="emojis/openmouth.png" alt="">
</div>    
<font style="color:white;">0 Reactions</font>&nbsp; <button class="like-button"><font class="show-emojis">Like</font></button>&nbsp; <font color="white">jose reacted and 25 others...</font>
</div>


</div>




<?php include("layout/footer.php");?>

