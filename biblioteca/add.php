<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?
// Create connection
$connect = new mysqli('localhost', 'root', 'root', 'books');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
if (!empty($_POST['title']) && !empty($_POST['year'])) {
    $sql = "INSERT INTO books (title, year, pages, author)
		VALUES ('" . $_POST['title'] . "', " . $_POST['year'] . ", " . $_POST['pages'] . ", '" . $_POST['author'] . "')";

    if ($connect->query($sql) === TRUE) {
        echo "Новая книга была добавлена в библиотеку";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}


$connect->close();
?>

<form method="post">
    Название книги <input placeholder="Название книги" type="text" name="title"><br>
    Год <input class="a" placeholder="Год" type="number" name="year"><br>
    Кол-во страниц <input placeholder="Кол-во страниц" type="number" name="pages"><br>
    Автор <input class="b" placeholder="Автор" type="text" name="author"><br>
    <input class="add" type="submit" value="Добавить"><br>
</form>

<button class="add"><a href="http://biblioteca/">Показать список книг</a></button>
<br>
<style>
    .a {
        margin-left: 85px;
    }
    .b {
        margin-left: 63px;
    }
    a {
        text-decoration: none;
        color: black;
    }
    .add {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .add {
        margin-left: 10px;
        background-color: white;
        color: black;
        border: 2px solid #35dafd;
    }

    .add:hover {
        background-color: #35dafd;
        color: white;
    }
    button {
        background-color: #4CAF50;
        border: none;
        color: #000000;
        padding: 10px 20px;
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
        margin-left: 10px;
        background-color: #35dafd;
        color: black;
        border: 2px solid #35dafd;
    }

    button:hover {
        background-color: #35dafd;
        color: #000000;
    }

</style>


</body>
</html>