<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo</title>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-container">
            <h1>To Do List <i class="fa fa-edit"></i></h1>
            <form class="form" action="lib.php" method="POST">
                <label>Title: </label><input type="text" name="title"/>
                <label>Description: </label><textarea name="description" rows="5" cols="40"></textarea>
                <input type="date" name="to-do-date">
                <input type="submit" value="add" class="uppercase" name="submit">
            </form>
        </div>
    </div>


<script src="jquery-2.2.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    $(".buttonadd").click(function(){
    $(".form").toggle();
    });
</script>

    <?php
    $dsn = 'mysql: host=localhost; dbname=todo';
    $user = 'root';
    $password = 'P@ssw0rd';
    try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }

    $sql= "SELECT * FROM List";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row)
        {
            echo "<div class='wrapper'>
            <form action='edit.php' method='POST' class='form-display'>";
            echo "<input type='text' name='updateid' value='{$row['id']}'>";
            echo "<input type='text' name='updatetitle' value='{$row['title']}'>";
            echo "<input type='text' name='updatedesc' value='{$row['description']}'>";
            echo "<button type='submit' name='update'>Update</button>";
            echo "<button type='submit' name='delete'>Delete</button>";
            echo "</form></div>";
        }
    ?>
</body>
</html>