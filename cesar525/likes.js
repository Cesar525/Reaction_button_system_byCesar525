const emojis_path = [
    "cesar525/emojis/thumbsup.png", //0
    "cesar525/emojis/thumbsup.png", //1
    "cesar525/emojis/love.png", //2
    "cesar525/emojis/openmouth.png", //3
    "cesar525/emojis/angry.png", // 4
    "cesar525/emojis/laughing.png", // 5
    "cesar525/emojis/sad.png" // 7
];

const emojis_reaction_design = {
    "0" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>", // 0
    "1": "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Liked</font></div>", // 1
    "2" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",// 2
    "3" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>", // 3
    "4" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" , // 4
    "5": "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>", // 5
    "6" : "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>" // 6
    };
   

   
 function mouseovershow(post_id){ 
   document.getElementById("selectingContainer" + post_id).style.display = "block";
};

function emojiWindowMouseOut(post_id){ 
    document.getElementById("selectingContainer" + post_id).style.display = "none";

};
 
function clickingToDelete(post_id, user_id){
const get_default_react = emojis_reaction_design['0'];


//set button to default
document.getElementById("showemojis" + post_id).innerHTML = get_default_react;
//deleting reaction
$("#one" + post_id).load("likes_api.php", { post_ids : post_id,
                                                user_ids : user_id,
                                                key_deleting : "deleting"});
$("#like_message" + post_id).load("likes_api.php", {load_message: "key",
                                            user_ids : user_id,
                                        post_ids : post_id });

};
function closeOnClick(post_id){
    document.getElementById("selectingContainer" + post_id).style.display = "none";
    
}
function  reactionProccess(data, post_id, user_id){
    const getcurrentReact =  data.getAttribute("data-current-" + post_id);
   const getReactionNumber = data.getAttribute("data-emoji-" + post_id);
document.getElementById("showemojis" + post_id).innerHTML = emojis_reaction_design[getReactionNumber];
$("#one" + post_id).load("likes_api.php", { new_reaction : getReactionNumber,
                                post_ids : post_id,
                            user_ids : user_id,
                        adding_react : "adding"});
                       
                        if(getReactionNumber != getcurrentReact){
$("#like_message" + post_id).load("likes_api.php", {load_message: "key",
                                            user_ids : user_id,
                                        post_ids : post_id });
                                    }

};// + getReactionNumber