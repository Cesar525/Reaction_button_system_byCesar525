<?php
include("cesar525/engine/init.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
$emojis_reaction_design = [
     "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Like</font></div>",
     "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/thumbsup.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #6969ff;'> Liked</font></div>",
 "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/love.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Love</font></div>",
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/openmouth.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Wow</font></div>",
 "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/angry.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #ff5e5e;'> Angry</font></div>" ,
    "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/laughing.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;color: #dfdf7f;'> Haha</font></div>",
     "<div><img class='emojis-button' style='width:10px;' src='cesar525/emojis/sad.png' alt='nothing'> <font style='font-size: 10px;margin-left: -9px;position: relative;top: -1px;'> Sad</font></div>"
];


    //Here we adding a like and if there is alike alrady this wil delete the like and add anew one.
if(isset($_POST['new_reaction'], $_POST['user_ids'], $_POST['post_ids'])){

//variables
$react_type = $_POST['new_reaction'];  /// reaction type by number
$reacted_object_id = $_POST['post_ids']; // id if object user reacted to
$react_made_by = $_POST['user_ids']; // id of user that posted the reaction

//checking if there is any likes on this post. my user_id and post_id check
$checking_for_likes = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE like_by_user_id='$react_made_by' AND like_post_id='$reacted_object_id'", $conn);
$like_found = false;
if($checking_for_likes){
   // echo 'working';
    if(mysqli_num_rows($checking_for_likes) > 0){
        $like_found = true;
        // if there is more like than ziro then it will be dleted.
    }
if($like_found){
    // here is like where found it will deleted
    $deleting_like = query("DELETE FROM likes_storage WHERE like_by_user_id='$react_made_by' AND like_post_id='$reacted_object_id'", $conn);
    if($deleting_like){
    // echo 'Deleting Succes';
    }else{
   //  echo 'Deleting not success';
        }
    }   
}else{
    echo 'not working';
}

//inserting Reaction
$result_like_insert = query("INSERT INTO likes_storage (like_type, like_by_user_id, like_post_id) 
                                                VALUES ('$react_type', '$react_made_by', '$reacted_object_id')", $conn);;
if($result_like_insert){
   // echo'INSERTED!';
    //echo $emojis_reaction_design[$react_type];
}else{
   // echo 'ERROR';
}

}

if(isset($_POST['user_ids'], $_POST['post_ids'], $_POST['key_deleting'])){
    //set variables
    echo '<br>entered'; 
    $post_id_deleting  = $_POST['post_ids'];
    $user_id = $_POST['user_ids'];
    $keyToDelete = $_POST['key_deleting']; 
    
    
    //key to deleting
    if($keyToDelete === "deleting"){
$deleting_like = query("DELETE FROM likes_storage WHERE like_by_user_id='$user_id' AND like_post_id='$post_id_deleting'", $conn);
if($deleting_like){
//echo 'SQL working like has been deleted';
}else{

 //  echo'Error deleting the sql';
}


    }
}

if(isset($_POST['load_message'], $_POST['user_ids'], $_POST['post_ids'])){
    if($_POST['load_message'] == "key"){
$user_id = $_POST['user_ids'];
$post_id = $_POST['post_ids'];
        echo likeMessage($post_id, $user_id, $conn);

    }
}


}else{
echo 'Ops!! Error';
}



?>