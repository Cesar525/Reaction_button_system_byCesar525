<?php

function query($sql, $conn){
    $result_of_query = mysqli_query($conn, $sql);
    if($result_of_query){
        return $result_of_query;
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

function countingPostReactions($post_id, $conn){
    $coutning_total_react = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE  like_post_id='$post_id'", $conn);
if($coutning_total_react){
    
    if(mysqli_num_rows($coutning_total_react) == 0){
        $react_count = 0;
    return $react_count;
    }else{
        $react_count = mysqli_num_rows($coutning_total_react);
       return $react_count;
    }
}
}


// this function need more work 
function likeMessage($post_id, $user_id, $conn){
    sleep(0.6);
$checking_for_likes = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE  like_post_id='$post_id'", $conn);
$checking_for_likesUser = query("SELECT like_type, like_by_user_id, like_post_id FROM likes_storage WHERE  like_by_user_id='$user_id' AND like_post_id='$post_id'", $conn);
//variables
$like_by_me_only = false;
$like_by_one_user_only = false;
$no_likes_yet = false;
$like_more_than_one_but_me = false;
$like_by_me_and_more_users = false;
$me_and_one_user_reacted_to_it = false;

if($checking_for_likesUser){
 //   echo'Working1';
$reacted_by_user = mysqli_num_rows($checking_for_likesUser); 

}else{
   // echo'not working';
}

if($checking_for_likes){
 //  echo 'Workin2';
$row = mysqli_fetch_assoc($checking_for_likes);
$count_likes_by_others = mysqli_num_rows($checking_for_likes);
}else{
  //  echo 'not working';
}


if($count_likes_by_others == 0){
    if($reacted_by_user == 0){
        $no_likes_yet = true;
    }
   }

if ($count_likes_by_others == 1){
    if($reacted_by_user == 0) {
        $like_by_one_user_only = true;
    }
}
if($count_likes_by_others > 1){
    if($reacted_by_user == 0){
    $like_more_than_one_but_me = true;
    }
}
if($count_likes_by_others == 1){
    if($reacted_by_user == 1){
        $like_by_me_only = true;
    }
}
if($count_likes_by_others > 2){
    if($reacted_by_user == 1){
        $like_by_me_and_more_users = true;
    }
}
if($count_likes_by_others == 2){
    if($reacted_by_user == 1){
        $me_and_one_user_reacted_to_it = true;
    }
}

    if($like_by_one_user_only){ // others react toit but you
    echo $count_likes_by_others. ' user reacted to this.'; // done works
    }
    if($like_by_me_only){ // when you are the only first one reacting to it.
        echo ' You reacted to this.';   // done works
    }
    if($like_more_than_one_but_me){ // done works
        echo $count_likes_by_others . ' users reacted to this.';
    }
    if($no_likes_yet){ // woks
        echo' No reaction yet';
    }
    if($like_by_me_and_more_users){
        echo 'you and '. $count_likes_by_others.' others reacted to this';
    }
    if($me_and_one_user_reacted_to_it){
        echo'you and another user reacted to this'; 
    }
    
}

?>