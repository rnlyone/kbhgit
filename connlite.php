<?php $conn = new mysqli("localhost",$_SESSION['dbuser'] , $_SESSION['dbpass'] , $_SESSION['dbname']);




// // // Check connection
if (!$conn) {
  die("Connection failed: " . $conn->connect_error);
  // $die = "Connection Failed ".mysqli_connect_error();
  header('Location:index.php?die='.$die);
} else {
  if( !isset($database) && !isset($username) ){
    $database = $_SESSION['dbname'];
    $username = $_SESSION['dbuser'];
  }
  
  // foreach($result as $val){
  //   if($val['dbname'] == $database && $val['dbuser'] == $username){
  //     $message = "Connected Successfully";
  //     if($page != "logging"){
  //       header('Location:logging.php?message='.$message);
  //     }
  //   }
  // }
}

?>