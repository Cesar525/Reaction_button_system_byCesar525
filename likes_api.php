<?php
include("cesar525/engine/init.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

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
    echo 'working';
    if(mysqli_num_rows($checking_for_likes) > 0){
        $like_found = true;
        // if there is more like than ziro then it will be dleted.
    }
if($like_found){
    // here is like where found it will deleted
    $deleting_like = query("DELETE FROM likes_storage WHERE like_by_user_id='$react_made_by' AND like_post_id='$reacted_object_id'", $conn);
    if($deleting_like){
        echo 'Deleting Succes';
    }else{
        echo 'Deleting not success';
        }
    }   
}else{
    echo 'not working';
}

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