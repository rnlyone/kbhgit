<?php

include_once('conn.php');

try {
    $count = count($_POST['id']);
    for($i = 0; $i < $count; $i++) {
        // print_r($_POST['table_name'][1]);
        $table = $_POST['table_name'][$i];
        $id = $_POST['id'][$i];
        $data1 = $_POST['data1'][$i];
        $data2 = $_POST['data2'][$i];

        // echo "\n".$table.$id.$data1.$data2;
    
        try {
            str_replace('T', ' ', $data1);
            $date = $data1;
            if ($table = 'email_log') {
                $sql = "UPDATE ".$table." SET date_sent = '".$date."', body = '".$data2."' where log_id ='".$id."'";
                
            } else if ($table = 'event_log') {
                $sql = "UPDATE ".$table." SET date_logged = '".$date."', message = '".$data2."' where log_id ='".$id."'";
                
            } else if ($table = 'submissions') {
                str_replace('T', ' ', $data2);
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
    }
} catch (\Throwable $th) {
    echo $th;
}

