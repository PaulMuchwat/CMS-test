<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=cms','root','');
} catch (PDOExeption $e) {
    exit('Database error.');
}


?>