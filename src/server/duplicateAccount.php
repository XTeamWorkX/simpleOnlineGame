<?php
/*
*   Verify account is existed
*   @version 1.0
*/

if(isset($_POST['account'])){
    $account = $_POST['account'];

    require_once __DIR__ . '/DBConnect.php';

    //new PDO connection
    $dbcon = new DBConnect();

    $sql = "SELECT * FROM account WHERE account = ?";

    $result = $dbcon->query($sql , array($account))->rowCount();

    if($result != null || $result != false){
        if($result == 1){
            echo "false";
        } else {
            echo "true";
        }
    } else {
        echo "true";
    }

    //DB connection close
    $dbcon->close();
} else {
    echo 'No Post variables';
}

?>
