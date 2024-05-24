<?php
ob_start();
ini_set('session.cookie_httponly', true);
session_start();
session_regenerate_id();

// inactive in seconds
$inactive = 600; //if the user is inactive for 10 minutes (600 sec) the session is destroyed
if( !isset($_SESSION['timeout']) )
    $_SESSION['timeout'] = time() + $inactive;

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
{  session_destroy(); header("Location:index.php");     }

$_SESSION['timeout']=time();

function loggedin(){
    //change the session name depending on what u set on login
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    }
    else{
        return false;
    } 
}

?>