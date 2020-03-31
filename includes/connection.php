<?php
try {
    $pdo = new PDO('mysql:localhost;dbname=cms-test','root','');
} catch (PDOExeption $e) {
    exit('Database error.');
}


?>