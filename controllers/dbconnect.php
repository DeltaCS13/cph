<?php

if ($_SERVER['HTTP_HOST'] == 'localhost:8080')
   
{/*Local Host*/
     $dsn = 'mysql:host=localhost;dbname=cph';
    $username = 'root';
    $password = '';
    //echo "Phase 3: Showing data from cph.user_usr and cph.accesslevel_ual on Localhost";
}
else
{
    /*WebHost*/
    $dsn = 'mysql:host=localhost;dbname=techrat_cph';
    $username = 'techrat_hiker';
    $password = 'hike>'; 
    //echo "Phase 3: Showing data from cph.user_usr and cph.accesslevel_ual on web server";
}

 
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = "OH SNAP!";
        
        exit();
    }
?>