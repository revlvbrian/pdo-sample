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
$sql = "UPDATE List SET
            title = :updatetitle,
            description = :updatedesc
            WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':title', $_POST['updatetitle'], PDO::PARAM_STR);
$stmt->bindParam(':description', $_POST['updatedesc'], PDO::PARAM_STR);
$stmt->execute();
}

if(isset($_POST['delete'])){
    $sql = "DELETE FROM List WHERE id =  :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['updateid'], PDO::PARAM_INT);
    $stmt->execute();
    if ($pdo->prepare($sql) === TRUE)
    {
    echo "Record deleted successfully";
    }
    else
    {
    echo "Error deleting record: " . $pdo->error;
    }
}

header('Location: index.php');
exit();
?>