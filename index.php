<?php include("layout/header.php");?>  



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
// ADDING EMOJIS
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
    <button id="current" onclick="current(this);" style="display:inline-block;" class="like-button like-button-effect">Like</button>
<div class="emojis-container">
    <?php
    $count = count($emojis);

    for($counting = 0; $counting < $count; $counting++){
        echo'<img id="emojis" onclick="ProccessingLikes(this);" class="emojis-button"  src="'.$emojis[$counting].'" alt="" data-emojis-type="'.$counting.'">';
    }
    ?>
</div>
</div>

<script>
function ProccessingLikes(emojis){
const getting_data = emojis.getAttribute("data-emojis-type");
alert(getting_data);

}

function current(current_react){
alert(current_react.innerHTML);
if(current_react.innerHTML == Like){
document.getElementById("current")innertHTML.appendChild(elements[0]);
}

}
</script>

<?php include("layout/footer.php");?>

