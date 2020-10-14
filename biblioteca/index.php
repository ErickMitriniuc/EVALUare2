<html>
<head>
    <title></title>
</head>
<body>
<?
require_once 'func.php';
error_reporting(E_ALL);
$connection = mysqli_connect('localhost', 'root', 'root', 'books');

if (mysqli_connect_errno() !== 0) {
    die('Database error');
}
$books = mysqli_query($connection, 'SELECT * FROM books');


?>
<?
if (!empty($_GET['delete'])) {
    $queryString = "DELETE FROM books WHERE id = {$_GET['id']}";
    if (mysqli_query($connection, $queryString)) {
        $message = 'Удаление прошло успешно';
    } else {
        $message = 'Ошибка';
    }
}
?>

<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Year</th>
        <th>Pages</th>
        <th>Author</th>
    </tr>
    </thead>
    <tbody>
    <?
    foreach ($books as $book) { ?>
        <tr>
            <td><?= formatName($book['title']); ?></td>
            <td><?= $book['year']; ?></td>
            <td><?= $book['pages']; ?></td>
            <td><?= formatName($book['author']); ?></td>
            <td>
                <a class="delete" href="?module=books&action=list&delete=1&id=<?= $book['id']; ?>"
                   onclick="return confirm('Удалить книгу?')">Удалить</a>
                <a href="http://biblioteca/update.php?module=books&action=update&id=<?= $book['id']; ?>">Изменить</a>
            </td>
        </tr>
    <? } ?>
    </tbody>
</table>

<button>
    <a class="new" href="http://biblioteca/add.php">Новая книга</a>
</button>
<style>
    .delete {
        color: red;
    }
    a {
        color: #29b7d9;
        text-decoration: none;
    }
    .new {

        color: #255f6e;
    }
    button {
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

    button {
        margin-left: 70px;
        background-color: white;
        color: black;
        border: 2px solid #35dafd;
    }

    button:hover {
        background-color: #35dafd;
        color: white;
    }
</style>
</body>
</html>