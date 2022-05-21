<?php

include_once('conn.php');

try {
    $count = count($_POST);
    foreach($_POST['isi']['id'] as $key => $val) {
        // print_r($_POST['isi']['tabel']);
        $tabell = $_POST['isi']['tabel'][$key];
        $id = $_POST['isi']['id'][$key];
        $data1 = $_POST['isi']['data1'][$key];
        $data2 = $_POST['isi']['data2'][$key];
        
    
        try {
            $data1 = str_replace('T', ' ', $data1);
            if ($tabell == 'email_log') {
                $sql = "UPDATE email_log SET date_sent = '".$data1."', body = '".$data2."' where log_id ='".$id."'";
                
                // $query = $conn->query($sql);
                
            } else if ($tabell == 'event_log') {
                $sql = "UPDATE event_log SET date_logged = '".$data1."', message = '".$data2."' where log_id ='".$id."'";
                // $query = $conn->query($sql);
                
                
            } else if ($tabell == 'submissions') {
                $data2 = str_replace('T', ' ', $data2);
                $sql = "UPDATE submissions SET date_submitted = '".$data1."', date_status_modified = '".$data2."' where submission_id ='".$id."'";
                // echo $sql;
                // $query = $conn->query($sql);
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

