const emojis_reaction = [
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Like</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
    ];
    

    function reactionProccessing(data, post_id){
        var default_reaction = 0;
        var new_emoji_react = data.getAttribute("data-emoji-" + post_id);
        var user_id = data.getAttribute("data-user-id");
        //document.getElementById(post_id + "showemojis").innerHTML = emojis_reaction[new_emoji_react];
        var current_react = document.getElementById(post_id + "showemojis");
        var getcurrent_react = current_react.getAttribute("data-current-" + post_id);
        alert(getcurrent_react);
       
//adding reaction
    if(getcurrent_react != new_emoji_react){ 
        console.log("adding new reeaction// Deleting the old reaction");
        document.getElementById(post_id + "showemojis").innerHTML = emojis_reaction[new_emoji_react];
       // addingreactions(new_emoji_react, user_id, post_id);
    }else{
            console.log("delete react// setup the default react");
            document.getElementById(post_id + "showemojis").innerHTML = emojis_reaction[0];
        }
    };

    
function addingreactions(new_reaction_, user_id_, post_id_){
    $(document).ready(function(){
        $("#one"+post_id_).load("likes_api.php", {new_reaction : new_reaction_ ,
                                                user_ids : user_id_,
                                                post_ids : post_id_ });
        });
    };