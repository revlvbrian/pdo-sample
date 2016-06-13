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

if(isset($_POST['update'])){
    $sql = "UPDATE List
            SET id = :id,
                title = :title,
                description = :description
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":id" => $_POST['updateid'],
                    ":title" => $_POST['updatetitle'],
                    ":description" => $_POST['updatedesc']));
}

if(isset($_POST['delete'])){
    $sql = "DELETE FROM List WHERE id =  :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['updateid'], PDO::PARAM_INT);
    $stmt->execute();
}

header('Location: index.php');
exit();
?>