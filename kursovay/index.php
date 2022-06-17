<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Курсовая</title>
</head>
<body>
    <?php
        echo '<header>';
            if (!isset($_GET['p'])) $_GET['p'] = 'view';
            echo '<a href="?p=view"';
            if($_GET['p'] == 'view') echo 'class="select"';
            echo '>Просмотр</a>';
            echo '<a href="?p=add"';
            if($_GET['p'] == 'add') echo 'class="select"';
            echo '>Добавление сообщения</a>';
        echo '</header>';
    ?>
    <main>
        <?php
            session_start();
            if (!isset($_SESSION['history'])) {//если переменная не существует
                $_SESSION['history'] = array();//то создаем ее и записываем в нее массив
            }
            else session_destroy();
            if ($_GET['p'] == 'view'){
                include 'view.php';
                if(!isset($_GET['pg'])) $_GET['pg'] = 0;
                echo getMessageList($_GET['pg']);
            } 
            else if (file_exists($_GET['p'].'.php')) include $_GET['p'].'.php';
        ?>
</body>
</html>