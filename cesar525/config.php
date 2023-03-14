<?php

//SETUP YOUR DATABASE
$config['localhost'] = "localhost";
$config['username'] = "root";
$config['password'] = "";
$config['database'] = "likes";  


//ACCOUNT SQL for user setup
$config['account_sql']  = "SELECT user_ids, user_name FROM account";
$config['user_name_account'] = "user_name"; // user name column name. 

$config['loggedin_useR_id'] = 133; // setup the logged in user id example $_SESSION[''user_id];


?>