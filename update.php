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
                $stmt = "UPDATE email_log SET date_sent =?, body =? where log_id =?";
                $stmt = $conn->prepare($stmt);
                $stmt->bind_param('ssi', $data1, $data2, $id);
                // $sql = "UPDATE email_log SET date_sent = '".$data1."', body = '".$data2."' where log_id ='".$id."'";
                
                // $query = $conn->query($sql);
                
            } else if ($tabell == 'event_log') {
                $stmt = "UPDATE event_log SET date_logged =?, message=? where log_id =?";
                $stmt = $conn->prepare($stmt);
                $stmt->bind_param('ssi', $data1, $data2, $id);
                // $sql = "UPDATE event_log SET date_logged = '".$data1."', message = '".$data2."' where log_id ='".$id."'";
                // $query = $conn->query($sql);
                
                
            } else if ($tabell == 'submissions') {
                $data2 = str_replace('T', ' ', $data2);
                $stmt = "UPDATE submissions SET date_submitted =?, date_status_modified=? where submission_id=?";
                $stmt = $conn->prepare($stmt);
                $stmt->bind_param('ssi', $data1, $data2, $id);
                // $sql = "UPDATE submissions SET date_submitted = '".$data1."', date_status_modified = '".$data2."' where submission_id ='".$id."'";
                // echo $sql;
                // $query = $conn->query($sql);
            }
    
            try {
                $stmt->execute();
                $check = $conn -> stat();
                if($query === false) {
                    echo $conn->error . $conn->errno . $stmt . $key;
                    exit;
                }
                header('Location:'.$_SERVER['HTTP_REFERER'].'&status="'.$check.'"');
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

