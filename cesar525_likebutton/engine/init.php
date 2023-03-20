<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
  <script src="./cesar525_likebutton/likes.js"></script>
  <link rel="stylesheet" href="cesar525_likebutton/emoji_style.css">

<?php
include("cesar525_likebutton/config.php");
include("cesar525_likebutton/engine/database.php");
include("cesar525_likebutton/engine/functions.php");

?>
<link rel="stylesheet" href="cesar525_likebutton/emoji_style.css">

<?php
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

?>
<link rel="stylesheet" href="cesar525_likebutton/modal_style.css">