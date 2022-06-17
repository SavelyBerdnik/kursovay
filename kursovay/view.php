<?php
    function getMessageList($page){
        $my_db = mysqli_connect('localhost', 'root', '', '#sorter');
        if (mysqli_connect_errno()) echo 'Ошибка подключения к БД'. mysqli_connect_error();

        $sql = 'SELECT COUNT(*) FROM `messages`';
        $sql_res = mysqli_query($my_db, $sql);
        if (mysqli_errno($my_db)) return 'Ошибка запроса';
        if (!$row = mysqli_fetch_row($sql_res)) return 'В таблице нет записей';
        $pages = ceil($row[0]/10);
        if ($pages >= $row[0]) $page = $pages-1;
        
        $sql = 'SELECT * FROM `messages` ORDER BY `heshtag` LIMIT '.($page*10).',10';
        $sql_res = mysqli_query($my_db, $sql);
        if (mysqli_errno($my_db)) return 'Ошибка запроса';

        $result = '<table>';
        $result .= '<tr><th>ID</th><th>#</th><th>Сообщение</th></tr>';

        while($row = mysqli_fetch_assoc($sql_res)){
            $result .= '<tr><td>'.$row['id'].'</td>
                        <td>'.$row['heshtag'].'</td>
                        <td>'.$row['message'].'</td></tr>';
        }
        $result .= '</table>';

        return $result;
    }
?>