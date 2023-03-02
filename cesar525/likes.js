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
        var default_reaction = 0;
        var new_emoji_react = data.getAttribute("data-emoji-" + post_id);
        var user_id = data.getAttribute("data-user-id");
        var current_reaction = data.getAttribute("data-current-" + post_id);
        document.getElementById(post_id + "showemojis").innerHTML = emojis_reaction[new_emoji_react];
        alert(default_reaction +'='+ current_reaction);
       
//adding reaction
    if(current_reaction != new_emoji_react){
$(document).ready(function(){
$("#one"+post_id).load("likes_api.php", {new_reaction : new_emoji_react,
                                        user_ids : user_id, post_ids : post_id });
});}else{

}

}
    
function current(data, post_id){
    var current_posted_reaction = data.getAttribute("data-current-" + post_id);

    alert(current_posted_reaction);
} 
function unlike(){
    $(document).ready(function(){
        $("#one"+post_id).load("likes_api.php", {new_reaction : new_emoji_react,
                                                user_ids : user_id, 
                                                post_ids : post_id,
                                                unlike : "unlike_key"});
        });
}
    