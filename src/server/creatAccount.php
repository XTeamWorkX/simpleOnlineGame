<?php
    if(isset($_POST['account']) && isset($_POST['password']) && isset($_POST['nickname']) && isset($_POST['birthday']) && isset($_POST['gender'])){
        $account = $_POST['account'];
        $password = $_POST['password'];
        $nickname = $_POST['nickname'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
    } else {
        echo "No Post value";
    }

    require_once __DIR__ . '/DBConnect.php';

    $db = new DB_CONNECT();

    $sql = mysqli_query("INSERT INTO account(account, password, nickname, birthday, gender) VALUES('$account', '$password', '$nickname', '$birthday', '$gender'));

    if($sql != false){
            header('Location: ../web/index.html');

    } else {
        header('Location: ../web/lobby.html');
    }
?>