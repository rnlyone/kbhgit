<?php

include_once('conn.php');

$table = $_POST['table'];
$id = $_POST['id'];
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];

try {
    str_replace('T', ' ', $data1);
    $date = $data1;
    if ($table = 'email_log') {
        $sql = "UPDATE ".$table." SET date_sent = '".$date."', body = '".$data2."' where log_id ='".$id."'";
        
    } else if ($table = 'event_log') {
        $sql = "UPDATE ".$table." SET date_logged = '".$date."', message = '".$data2."' where log_id ='".$id."'";
        
    } else if ($table = 'submissions') {
        $date2 = date_format($data2, '%Y/%m/%d %H:%i:%s');
        $sql = "UPDATE ".$table." SET date_submitted = '".$date."', date_status_modified = '".$data2."' where submission_id ='".$id."'";
    }

    try {
        $query = $conn->query($sql);
        header('Location:'.$_SERVER['HTTP_REFERER'].'&status="Sukses"');
    } catch (\Throwable $th) {
        header('Location:'.$_SERVER['HTTP_REFERER'].'&status="Update Gagal" ('.$th.')');
    }
} catch (\Throwable $th) {
    echo $th;
}


