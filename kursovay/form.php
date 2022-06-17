<?php
    $row = [
        'heshtag'=>'',
        'message'=>'',
    ];
    $button = 'Добавить запись';
    if (isset($_GET['id'])){
        $button = 'Изменить запись';
        $my_db = mysqli_connect('localhost', 'root', '', '#sorter');
        if (mysqli_connect_errno()) echo 'Ошибка соединения с БД'. mysqli_connect_error();

        $sql = 'SELECT * FROM `messages` WHERE `id` = "'.$_GET['id'].'"';
        $sql_res=mysqli_query($my_db, $sql);
        if (mysqli_errno($my_db)) echo 'Ошибка запроса.';
        else $row = mysqli_fetch_assoc($sql_res);
    }
?>
<form name="form_add" method="post">
    <div class="column">
        <div class="add">
            <label>Сообщение</label> <textarea name="message" placeholder="Ваше сообщение" required><?=$row['message'];?></textarea>
        </div>
        <div class="add">
            <label>#</label> <input type="text" name="heshtag" value="<?=$row['heshtag'];?>" required>
        </div>
            <button type="submit" value="<?=$button;?>" name="button" class="form-btn"><?=$button;?></button>
    </div>
</form>