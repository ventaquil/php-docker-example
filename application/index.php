<?php

$pdo = new PDO('mysql:host=database', 'root', 'root');

$pdo->query('CREATE DATABASE IF NOT EXISTS `testdb`');
$pdo->query('USE `testdb`');

$pdo->query('CREATE TABLE IF NOT EXISTS `config` (`key` VARCHAR(256), `value` VARCHAR(1024), PRIMARY KEY (`key`)) CHARACTER SET utf8 COLLATE utf8_general_ci');

$statement = $pdo->prepare('SELECT * FROM `config` WHERE `key` = :key');

$statement->bindValue(':key', 'visitors');

$statement->execute();

$result = $statement->fetch();

if ($result === false) {
    $visitors = 0;

    $statement = $pdo->prepare('INSERT INTO `config` (`key`, `value`) VALUES (:key, :value)');

    $statement->bindValue(':key', 'visitors');

    $statement->bindParam(':value', $visitors);

    $statement->execute();
} else {
    $visitors = $result['value'];
}

++$visitors;
?>

<h1>Docker demo</h1>

<p><?php echo "You are {$visitors} visitor" ?></p>

<?php
$statement = $pdo->prepare('UPDATE `config` SET `value` = :value WHERE `key` = :key');

$statement->bindValue(':key', 'visitors');

$statement->bindParam(':value', $visitors);

$statement->execute();

