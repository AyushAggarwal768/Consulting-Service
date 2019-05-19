<?php
error_reporting(0);
ob_start();
session_start();

//database conneciton
$hostname = "localhost"; //sql port no
$username = "root"; //user name
$password = "admin"; //password
$dbname = "consulting_service";

$con = mysqli_connect($hostname, $username, $password)
        or die("Unable to connect to MySQL");

//select a database
$selected = mysqli_select_db($con, $dbname) //database name
        or die("Could not select examples");


$user_id = $user_name = $user_type = "";
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}
if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
}

$cookie_name = 'my_big_cart';
$cookie_time = 3600 * 24 * 15; // 15 days
$expire = 3600 * 24 * 30; // 15 days
//function for validate name field
function DoSecure($a_value) {
    $output = trim($a_value);
    $output = str_replace("<!--", "", $output);
    //Replace JS Tag, HTML tags, etc...
    $search = array('@<script[^>]*?>.*?</script>@si',
        '@<[\/\!]*?[^<>]*?>@si',
        '@([\r\n])[\s]+@'
    );
    $replace = array('',
        '',
        '\1'
    );
    $output = preg_replace($search, $replace, $output);
    $output = htmlspecialchars($output);
    return $output;
}
?>
