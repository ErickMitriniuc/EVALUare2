<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'books');
$queryString = "
    SELECT
        books.id,
        title, 
        year,
        pages,
        author
    FROM
        books 
";
$books = mysqli_query($connection, $queryString);
foreach ($books as $b) {
    if ($b['id'] === $_GET['id']) {
        $book = $b;
    };
};
if (!empty($_POST['title']) && !empty($_POST['year'])) {
    $queryString = "
      UPDATE books 
      SET 
        title = '{$_POST['title']}', 
        year = '{$_POST['year']}', 
        pages = {$_POST['pages']},
        author = {$_POST['author']}
      WHERE id = {$_GET['id']}
        ";
    if (mysqli_query($connection, $queryString)) {
        $message = 'Книга обновлена';
    } else {
        $message = 'Ошибка';
    }
}
?>
<? if (empty($message)) { ?>
    <form action="" method="post">
        <table border="1">
            <tr>
                <td>Название книги</td>
                <td><input placeholder="Название" type="text" name="title" value="<?= $book['title']; ?>"></td>
            </tr>
            <tr>
                <td>Год издательства</td>
                <td><input placeholder="Год" type="number" name="year" value="<?= $book['year']; ?>"></td>
            </tr>
            <tr>
                <td>Кол-во страниц</td>
                <td><input placeholder="Кол-во" type="number" name="pages" value="<?= $book['pages']; ?>"></td>
            </tr>
            <tr>
                <td>Автор</td>
                <td><input placeholder="Автор" type="text" name="author" value="<?= $book['author']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="save" type="submit" value="Сохранить">
                </td>
            </tr>
        </table>
    </form>
<? } else { ?>
    <strong><?= $message; ?></strong>
<? } ?>
<style>
    .save {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .save {
        margin-left: 70px;
        background-color: white;
        color: black;
        border: 2px solid #35dafd;
    }

    .save:hover {
        background-color: #35dafd;
        color: white;
    }
</style>
