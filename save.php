<?php

// $ROOT = "./Applications/XAMPP/xamppfiles/htdocs/kbhlog/";

$txtname = 'dbname.txt';
$txtuser = 'dbuser.txt';
$txtpass = 'dbpass.txt';

$db = $_POST['dbname'];
$un = $_POST['dbuser'];
$ps = $_POST['dbpass'];

try {
    
    if(is_writeable($txtname)){
        if (!$fp = fopen($txtname, 'a')) {
            echo "Cannot open file ($txtname)";
            exit;
       }
        if (fwrite($fp, $db) === FALSE) {
            echo "Cannot write to file ($txtname)";
            exit;
        }
        fclose($fp);
    }

    if (!$fp1 = fopen($txtuser, 'a')) {
        echo "Cannot open file ($txtuser)";
        exit;
   }
    if (fwrite($fp1, $un) === FALSE) {
        echo "Cannot write to file ($txtuser)";
        exit;
    }
    fclose($fp1);

    if (!$fp2 = fopen($txtpass, 'a')) {
        echo "Cannot open file ($txtpass)";
        exit;
   }
    if (fwrite($fp2, $ps) === FALSE) {
        echo "Cannot write to file ($txtpass)";
        exit;
    }
    fclose($fp2);

} catch (\Throwable $th) {
    echo $th;
}

// include_once('conn.php');
