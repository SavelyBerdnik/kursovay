<?php
    include 'form.php';
    $my_db = mysqli_connect('localhost', 'root', '', '#sorter');
    if (mysqli_connect_errno()) echo 'Ошибка подключения к БД'. mysqli_connect_error();
    
    if (isset($_POST['button']) && $_POST['button'] == 'Добавить запись'){
        $sql = 'INSERT INTO `messages`(`heshtag`, `message`) 
            VALUES ("'.htmlspecialchars($_POST['heshtag']).'", 
            "'.htmlspecialchars($_POST['message']).'")';

    $sql_res = mysqli_query($my_db, $sql);
    if (mysqli_errno($my_db)) echo 'Ошибка запроса';
    else{
        echo '<div class = "success">Запись добавлена';
        $_SESSION['history'][] = $_POST['heshtag'];
    }
    }

    
?>