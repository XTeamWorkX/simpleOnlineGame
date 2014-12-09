<?php
/*
*   createAccount
*   @version 1.0
*/

if(isset($_POST['account']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['nickname']) && isset($_POST['birthday']) && isset($_POST['gender'])){

    $account = $_POST['account'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    require_once __DIR__ . '/DBConnect.php';

    //new PDO connection
    $dbcon = new DBConnect();
    $sql = "SELECT * FROM account WHERE account = ?";

    $result = $dbcon->query($sql , array($account))->rowCount();


    if($result != null || $result != false){
        if($result == 1){
            echo "Duplicate account";
        }
    } else {
        $sql = "INSERT INTO account(account, password, email, nickname, birthday, gender) VALUES (?, ?, ?, ?, ?, ?)";

            $resultInsert = $dbcon->query($sql, array($account, $password, $email, $nickname, $birthday, $gender));
            if($resultInsert != null || $resultInsert != false) {
                echo "Succeed";
            } else {
                echo "Insert account query failed";
            }
    }


} else {
    echo "No Post data";
}




?>