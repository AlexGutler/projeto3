<?php
require_once("connection.php");

$buscaConteudo = function ($sql) use ($connection)
{
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    echo "teste";
    return $stmt->fetch(\PDO::FETCH_ASSOC);
};

try {
    $query = function($sql, $unique = false) use($connection) {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        if ($unique) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    };

    function uri_atual(){
        $uri  = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $rota = explode('/',$uri['path'],2);
//        if ($rota[1] == ""){
//            return 'home';
//        } else {
//            return $rota[1];
//        }
        return $rota;
    }

    function roteamento($param){
        $minhasRotas = array("contato","empresa","home","servicos","contato-mensagem");
        if(in_array($param[1], $minhasRotas)){
            require_once($param[1].'.php');
        } elseif ($param[1] == ""){
            require_once('home.php');
        } else {
            require_once('404.php');
        }
    }
} catch (\PDOException $e){
    die(print_r($e->getMessage()));
}