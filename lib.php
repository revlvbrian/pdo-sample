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

    if(isset($_POST['submit'])){
    $sql = "INSERT INTO List(title,
                description) VALUES (
                :title,
                :description)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
    $stmt->execute();
    }

header('Location: index.php');
exit();

?>