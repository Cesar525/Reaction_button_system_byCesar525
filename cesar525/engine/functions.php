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
function likeMessage($user_id, $post_id, $count){
    if(true){ // you and others react to it
echo 'You and '.$count.' others reacted this.';
    }
    if(true){ // others react toit but you
    echo $count. 'people reacted to this.';
    }
    if(true){ // when you are the only first one reacting to it.
        echo 'You reacted to this.';
        
    }
}

?>