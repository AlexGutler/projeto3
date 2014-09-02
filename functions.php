<?php
require_once("connection.php");

try {
    $query = function($sql) use($connection) {
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    };
} catch (\PDOException $e){
    die(print_r($e->getMessage()));
}