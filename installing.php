<?php
//include this these headers on top of the page where the like will be located.
include("cesar525_likebutton/engine/init.php");

//include these variables inside the while loop set them up with your own info along with the display function .

$post_id = 1;
$loggedin_user_id = 234;
$account_SQL = "SELECT user_id, user_name FROM account";
$account_user_name_column = "user_name";
$select_column = "user_id";

//display the button fucntion
echo'<center>';
echo REACT_BUTTON($post_id, $loggedin_user_id, $account_SQL, $account_user_name_column, $select_column, $conn);
echo '</center>';
?>