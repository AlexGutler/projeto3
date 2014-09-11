<?php
require_once("fixtures/conexaoDB.php");

function query($sql, $unique = false){
    try{
        $connection = conexaoDB();
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        if ($unique){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    } catch (\PDOException $e){
        print_r($e->getMessage());
    }
}

function uri_atual(){
    $uri  = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $rota = explode('/',$uri['path'],2);

    return $rota;
}

function roteamento($param){
    try{
        $minhasRotas = array("contato","empresa","home","servicos","busca");
        if(in_array($param[1], $minhasRotas)){
            require_once($param[1].'.php');
        } elseif ($param[1] == ""){
            require_once('home.php');
        } else {
            require_once('404.php');
        }
    } catch (\PDOException $e){
        die(print_r($e->getMessage()));
    }
}