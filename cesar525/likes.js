const emojis_path = [
    "cesar525/emojis/thumbsup.png",
    "cesar525/emojis/thumbsup.png",
    "cesar525/emojis/love.png",
    "cesar525/emojis/openmouth.png",
    "cesar525/emojis/angry.png",
    "cesar525/emojis/laughing.png",
    "cesar525/emojis/sad.png"
];

const emojis_reaction_design = {
    "0" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
    "1": "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Liked</font></div>",
    "2" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
    "3" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
    "4" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
    "5": "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
    "6" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
    };
    

function like(){
const getCurrent = document.getElementById("showemojis").innerHTML;

}


function  reactionProccess(data, post_id, user_id){
    const getReactionNumber = data.getAttribute("data-emoji-type");
document.getElementById("showemojis" + post_id).innerHTML = emojis_reaction_design[getReactionNumber];
$("#one" + post_id).load("likes_api.php", { new_reaction : getReactionNumber,
                                post_ids : post_id,
                            user_ids : user_id});

};