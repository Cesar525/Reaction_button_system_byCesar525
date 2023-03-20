<?php
//include this these headers
include("cesar525_likebutton/engine/init.php");

//include these variables inside the while loop
$post_id = 1;
$loggedin_user_id = 234;
$account_SQL = NULL;
$account_user_name_column = NULL;


//display the button fucntion
echo'<center>';
echo REACT_BUTTON($post_id, $loggedin_user_id, $account_SQL, $account_user_name_column, $conn);
echo '</center>';
?>