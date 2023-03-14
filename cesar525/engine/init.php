<?php
include("cesar525/config.php");
include("cesar525/engine/database.php");
include("cesar525/engine/functions.php");

?>
<link rel="stylesheet" href="cesar525/emoji_style.css">

<?php
$emojis_reaction = [
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'><font class='glow'> Liked</font></font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
   "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
"<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
   "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Sad</font></div>"
];
$example_images = array(
    "cesar525/imgs/planet.jpg",
    "cesar525/imgs/moon.jpg"
);
// emojis downloaded at https://getemoji.com/
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
<link rel="stylesheet" href="cesar525/modal_style.css">