<?php include("layout/header.php");?>  



<style>
.like-main-container{
    background-color: #2e2d2d;
padding: 11px;
border-radius: 11px;
width: 351px;
}

.like-button{
    background-color: black;
    color: white;
    padding: 4px;
    width: 81px;
    border: solid 1px gray;
    
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
}


</style>

<?php 
$emojis = array(
"emojis/thumbsup.png",
"emojis/love.png",
"emojis/openmouth.png",
"emojis/angry.png",
"emojis/laughing.png",
"emojis/sad.png"
)
?>

<div style="background-color:white;padding: 11px;">


<div class="like-main-container">
    <span style="color:white">You like This and 20 others</span><br><hr>
    <button style="display:inline-block;" class="like-button">Like</button>
<div class="emojis-container">
    <?php
    $count = count($emojis);

    for($counting = 0; $counting < $count; $counting++){
        echo'<img class="emojis-button"  src="'.$emojis[$counting].'" alt="">';
    }
    ?>
    
</div>
</div>

<?php include("layout/footer.php");?>

