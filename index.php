<?php
$db = new PDO( 'mysql:host=localhost;dbname=todo;charset=utf8mb4', 'root', 'P@ssw0rd' );

$statement = $db->query('SELECT * FROM tasks');

$sql = $db->query('SELECT fruit, color, calories FROM tasks ORDER BY fruit');
    foreach ($db->query($sql) as $row) {
        print $row['fruit'] . "\t";
        print $row['color'] . "\t";
        print $row['calories'] . "\n";
    }

$fruits = $sql->fetchAll(PDO::FETCH_ASSOC);
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($results);
echo "<pre>";
print_r($fruits);