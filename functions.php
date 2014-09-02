<?php
require_once("connection.php");

try {
    $query = function($sql, $unique = false) use($connection) {
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        if ($unique) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    };

    function uri_atual(){
        $uri  = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $rota = explode('/',$uri['path'],2);

        if ($rota[1] == ""){
            return 'home';
        } else {
            return $rota[1];
        }
    }
} catch (\PDOException $e){
    die(print_r($e->getMessage()));
}