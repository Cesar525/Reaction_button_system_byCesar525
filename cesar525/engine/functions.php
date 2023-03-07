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
        echo 'its zero';
    }else{
        $num_rows = mysqli_num_rows($coutning_total_react);
       return $num_rows;
    }
}
}

?>