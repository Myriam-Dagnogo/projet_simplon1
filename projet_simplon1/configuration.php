<?php
try {
    $conn = new PDO ("mysql: host=localhost; dbname=formulaire;", "root","");

} catch (Exception  $e) {
    die ("Error:" .$e->getMessage());
}
?>