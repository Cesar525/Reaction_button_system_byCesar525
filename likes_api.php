<?php
include("cesar525/engine/init.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

if(isset($_POST['new_reaction'], $_POST['user_ids'], $_POST['post_ids'])){
//variables
$react_type = $_POST['new_reaction'];  /// reaction type by number
$reacted_object_id = $_POST['post_ids']; // id if object user reacted to
$react_made_by = $_POST['user_ids']; // id of user that posted the reaction

//checking if there is any likes on this post. my user_id and post_id check

//id there is likes delete the like

// add the new one.

//if there is no likes at all then just add one up.

//inserting Reaction
$result_like_insert = query("INSERT INTO likes_storage (like_type, like_by_user_id, like_post_id) 
                                                VALUES ('$react_type', '$react_made_by', '$reacted_object_id')", $conn);;
if($result_like_insert){
    echo'INSERTED!';
}else{
    echo 'ERROR';
}




}

}else{
echo 'Ops!! Error';
}



?>