const emojis_reaction = [
    "<div><img class='emojis-button' style='width:10px;' src='emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
    "<div><img class='emojis-button' style='width:10px;' src='emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
    ];
    

    function addingReaction(data, post_id){
        var getting_data = data.getAttribute("data-emoji-" + post_id);
        const current_reaction = document.getElementById(post_id + "emojiSelection");
       document.getElementById(post_id + "showemojis").innerHTML = emojis_reaction[getting_data];
       // adding reaction
$(document).ready(function(){
$("#one"+post_id).load("likes_api.php", {new_reaction : getting_data, current_react: current_reaction});
});


       

    }

  function api(){
    $(document).ready(function(){
    $("#like").click(function(){
    
    });
    });
    };