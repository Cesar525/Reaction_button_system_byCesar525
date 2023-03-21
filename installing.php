<?php
//include this these headers on top of the page where the like will be located.
include("cesar525_likebutton/engine/init.php");

//include these variables inside the while loop set them up with your own info along with the display function .

$post_id = 1; // post id where the like is gonna be this is an example to display the like button we need a post id
$loggedin_user_id = 234; // who ever is logged in id i usually use $_SESSION['ect ect'];

// Account SQL setup for showing who reacted
$account_SQL = "SELECT user_id, user_name FROM account"; // selecting the account and column we need to get the name of who ever reacted
$account_user_name_column = "user_name"; // we selecting the "user_name" column inside account table to get the name
$select_column = "user_id"; // we getting the name from which user_id?

//display the button fucntion
echo'<center>';
echo REACT_BUTTON($post_id, $loggedin_user_id, $account_SQL, $account_user_name_column, $select_column, $conn);
echo '</center>';
?>