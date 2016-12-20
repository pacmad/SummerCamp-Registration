
<?php

/* Gandikota Ramesh, Sujan    Account :  jadrn018
                CS545, Fall 2015    project #3  */
$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function get_db_handle() {
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn018';
    $password = 'movement';
    $database = 'jadrn018';
    
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page("Cannot Connect!");
        }
    return $db;
    }

function write_error_page($msg) {
    write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_footer();
    }
    
function write_header() {
print <<<ENDBLOCK
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<!-- Gandikota ramesh, Sujan    Account :  jadrn018
        CS545, Fall 2015
        Project #2 -->

    <head>
        <meta http-equiv="content-type" 
              content="text/html;charset=utf-8" />
        <title>Enroll</title>
        <link rel="stylesheet" type="text/css" href="css/summer_css.css" /> 
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/form.js"></script>
    </head>
    <body>   
ENDBLOCK;
}

function write_footer() {
    echo "</body></html>";
    }
?>