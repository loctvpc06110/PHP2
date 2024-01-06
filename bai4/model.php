<?php
    //Model
function get_all_users(){
    include("config.php");
    $sql ="SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $rows = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        $conn->close();
        return false;
    }
}
?>