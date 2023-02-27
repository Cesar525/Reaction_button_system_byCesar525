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

<script>

</script>


<div style="background-color:white;padding: 11px;">
<div class="like-main-container">
    <span style="color:white">You like This and 20 others</span><br><hr>
    <button id="current" onclick="current(this)" style="display:inline-block;" class="like-button like-button-effect"></button>
<div id="selecting_emoji" class="emojis-container">

</div>
</div>

<script>

const emojis_path = [
"emojis/thumbsup.png",
"emojis/love.png",
"emojis/openmouth.png",
"emojis/angry.png",
"emojis/laughing.png",
"emojis/sad.png"
];

const default_button = "<img class='emojis-button' src='" + emojis_path[0] + "' alt='nothing'> Like";
document.getElementById("current").innerHTML = default_button;




</script>

<?php include("layout/footer.php");?>

