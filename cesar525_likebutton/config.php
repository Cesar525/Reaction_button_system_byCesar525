<?php

//SETUP YOUR DATABASE
$config['localhost'] = "localhost";
$config['username'] = "root";
$config['password'] = "";
$config['database'] = "likes";  


//ACCOUNT SQL for user setup to show the names when you want to see who reacted to your post.
$config['accounts_sql']  = "SELECT user_id, user_name FROM account"; // SELECTS AND FROM ONLY
$config['user_name_account'] = "user_name"; // user name column name. 
$config['user_id_column_name'] = "user_id" // as it says

//

?>