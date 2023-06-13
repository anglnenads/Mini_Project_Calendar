<?php 

include "../dbconnect.php";

if(isset($_GET)){
    $sql = "SELECT id FROM events WHERE event_name = ?";

}


?>