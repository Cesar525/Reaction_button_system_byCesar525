const emojis_reaction = [
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
    ];
    

    function addingReaction(data, post_id){
        var getting_data = data.getAttribute("data-emoji-" + post_id);
        var user_id = data.getAttribute("data-user-id");
        const current_reaction = document.getElementById(post_id + "emojiSelection");
       document.getElementById(post_id + "showemojis").innerHTML = emojis_reaction[getting_data];
    
       // adding reaction
$(document).ready(function(){
$("#one"+post_id).load("likes_api.php", {new_reaction : getting_data,
                                        user_ids : user_id, post_ids : post_id });
});
    }

    function current(data, post_id){
        var datas = data.getAttribute("data-current-" + post_id);
        alert(datas);
    } 