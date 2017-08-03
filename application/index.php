<?php

$page = $_SERVER['REQUEST_URI'];

$pdo = new PDO('mysql:host=database', 'root', 'root');

$pdo->query('CREATE DATABASE IF NOT EXISTS `testdb`');
$pdo->query('USE `testdb`');

$pdo->query('CREATE TABLE IF NOT EXISTS `visitors` (`page` VARCHAR(256), `count` INT UNSIGNED DEFAULT 0, PRIMARY KEY (`page`)) CHARACTER SET utf8 COLLATE utf8_general_ci');

$statement = $pdo->prepare('SELECT * FROM `visitors` WHERE `page` = :page');

$statement->bindParam(':page', $page);

$statement->execute();

$result = $statement->fetch();

if ($result === false) {
    $visitors = 0;

    $statement = $pdo->prepare('INSERT INTO `visitors` (`page`, `count`) VALUES (:page, :count)');

    $statement->bindParam(':page', $page);

    $statement->bindParam(':count', $visitors);

    $statement->execute();
} else {
    $visitors = $result['count'];
}

++$visitors;

?>

<h1>Docker demo</h1>

<h2>Page <?php echo $page ?></h2>

<p><?php echo "You are {$visitors}. visitor" ?></p>

<?php

$statement = $pdo->prepare('UPDATE `visitors` SET `count` = `count` + 1 WHERE `page` = :page');

$statement->bindParam(':page', $page);

$statement->execute();

